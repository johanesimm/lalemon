<?php

namespace App\Modules\Admin\Repository;

use App\User;
use App\Modules\Admin\Models\Article;
use App\Modules\Admin\Models\ArticleCategory;
use App\Modules\Admin\Models\CustomerOrder;
use App\Modules\Admin\Models\CustomerProfile;
use App\Modules\Admin\Models\Product;
use App\Modules\Admin\Models\Promo;
use App\Modules\Admin\Models\Testimoni;
use Illuminate\Support\Facades\Storage;
use DB;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Datetime;
use Crypt;
use Exception;
use Session;

class AdminRepository {

    public function valdiateUser(array $data)
    {
        $response = array();

        try
        {
            if(empty($data)) throw new Exception("Whoop! Parameter can't be empty");

            $user = User::whereRaw('username LIKE "%'.$data['username'].'%"')->first();
            if(empty($user)) throw new Exception("Whoop! User not found");

            $attempt_data = array(
                'username' => $data['username'],
                'password' => $data['password'],
                'status' => $user->status
            );

            $result = Auth::attempt($attempt_data, true);

            if(!$user->save()) throw new Exception("Whoop! Sorry something went wrong, try again later");

            $response['status'] = $result;
        }
        catch(\Exception $ex)
        {
            $response['status'] = false;
            $response['message'] = $ex->getMessage();
        }

        return $response;
    }

    public function getAllProduct()
    {
        $response = array();

        try
        {
            $product = Product::orderBy('created_at', 'desc')->get();

            if($product->isEmpty()) throw new Exception("Whoops! Product empty");

            $response['status'] = true;
            $response['data'] = $product;

            return $response;
        }
        catch(Exception $ex)
        {
            $response['status'] = false;
            $response['message'] = $ex->getMessage();

            return $response;
        }
    }

    public function getProductDetail(array $data)
    {
        $response = array();

        try
        {
            if(empty($data)) throw new Exception("Whoops! Parameter can't be empty.");

            $product = Product::find($data['product_id']);

            if(empty($product)) throw new Exception("Whoops! Product not found");

            $response['status'] = true;
            $response['data']   = $product;

            return $response;
        }
        catch(Exception $ex)
        {
            $response['status'] = false;
            $response['message'] = $ex->getMessage();

            return $response;
        }
    }

    public function addNewProduct(Request $request)
    {
        $response = array();

        try
        {
            if(empty($request->all())) throw new Exception("Whoops! Parameter can't be empty.");
        
            if(!$request->hasFile('file')) throw new Exception("Product should have an image to continue this process.");

            $file = $request->file('file');

            $fileName = \Str::random(12).".".$file->getClientOriginalExtension();

            if(!Storage::disk('upload_product')->put($fileName, file_get_contents($file))) throw new Exception("Whoops! Sorry something went wrong, try again later.");

            $product = new Product();
            $product->name = $request['product_name'];
            $product->price = $request['product_price'];
            $product->description = $request['product_description'];
            $product->recommended = ($request['is_recommended']) ? 1 : 0;
            $product->file_path = "uploads/product/".$fileName;
            $product->file_name = $fileName;
            $product->status = 1;

            if(!$product->save()) throw new Exception("Whoops! Sorry something went wrong, try again later.");

            $response['status'] = true;
            $response['message'] = "Successfully create new product";

            return $response;

        }
        catch(Exception $ex)
        {
            $response['status'] = false;
            $response['message'] = $ex->getMessage();

            return $response;
        }
    }

    public function saveEditProduct(Request $request)
    {
        $response = array();

        try
        {
            if(empty($request->all())) throw new Exception("Whoops! Parameter can't be empty.");

            $product = Product::find($request['product_id']);

            if(empty($product)) throw new Exception("Whoops! Product not found");

            $product->name        = $request['product_name'];
            $product->price       = $request['product_price'];
            $product->recommended = ($request['is_recommended']) ? 1 : 0;
            $product->description = $request['product_description'];

            if(!$product->save()) throw new Exception("Whoops! Sorry something went wrong, try again later.");

            if($request->hasFile('file'))
            {
                $file = $request->file('file');

                if(!Storage::disk('upload_product')->put($product->file_name, file_get_contents($file))) throw new Exception("Whoops! Sorry something went wrong, try again later.");
            }

            $response['status'] = true;
            $response['message'] = "Successfully edit current product";

            return $response;
        }
        catch(Exception $ex)
        {
            $response['status'] = false;
            $response['message'] = $ex->getMessage();

            return $response;
        }
    }

    public function deleteCurrentProduct(array $data)
    {
        $response = array();

        try
        {
            if(empty($data)) throw new Exception("Whoops! Parameter can't be empty.");

            $product = Product::find($data['product_id']);

            if(empty($product)) throw new Exception("Whoops! Product not found");

            Storage::disk('upload_product')->delete($product->file_name);

            if(!$product->delete()) throw new Exception("Whoops! Sorry something went wrong, try again later.");

            $response['status'] = true;
            $response['message'] = "Successfully delete current product";

            return $response;
        }
        catch(Exception $ex)
        {
            $response['status'] = false;
            $response['message'] = $ex->getMessage();

            return $response;
        }
    }

    /** =================================== ARTICLE ========================================= */

    public function getArticleCategory()
    {
        $response = array();

        try
        {
            $articleCategory = ArticleCategory::all();

            if(empty($articleCategory)) throw new Exception("Whoops! Empty Article category");
        
            $response['status'] = true;
            $response['data'] = $articleCategory;

            return $response;
        }
        catch(Exception $ex)
        {
            $response['status'] = false;
            $response['message'] = $ex->getMessage();

            return $response;
        }
    }

    public function getAllArticle()
    {
        $response = array();

        try
        {
            $data = [];
            $data['newest_article'] = 
                DB::table('article AS a')
                ->join('m_article_category AS ac', 'ac.id', '=', 'm_article_id')
                ->select(
                    DB::raw('
                        a.id AS article_id,
                        a.title,
                        a.subtitle,
                        a.file_path,
                        a.created_at,
                        ac.name AS article_category,
                        ac.id AS artciel_category_id
                    ')
                )
                ->orderBy('a.created_at', 'desc')
                ->take(4)
                ->get()->toArray();
            $data["article"] = Article::with(array('category'))->orderBy('created_at', 'desc')->get();
            if($data['article']->isEmpty()) throw new Exception("Whoops! Product empty");
            $response['status'] = true;
            $response['data'] = $data;

            return $response;
        }
        catch(Exception $ex)
        {
            $response['status'] = false;
            $response['message'] = $ex->getMessage();

            return $response;
        }
    }

    public function getArticleById($article_id) {
        $response = array();

        try
        {
            $article = Article::whereRaw('id = :article_id', [
                ['article_id' => $article_id]
            ])->with(array('category'))->first();
            if(empty($article)) throw new Exception("Whoops! Product empty");
            $response['status'] = true;
            $response['data'] = $article;

            return $response;
        }
        catch(Exception $ex)
        {
            $response['status'] = false;
            $response['message'] = $ex->getMessage();

            return $response;
        }
    }

    public function addNewArticle(Request $request)
    {
        $response = array();

        try
        {
            if(empty($request->all())) throw new Exception("Whoops! Parameter can't be empty.");
        
            if(!$request->hasFile('file')) throw new Exception("Product should have an image to continue this process.");

            $file = $request->file('file');

            $fileName = \Str::random(12).".".$file->getClientOriginalExtension();

            if(!Storage::disk('upload_article')->put($fileName, file_get_contents($file))) throw new Exception("Whoops! Sorry something went wrong, try again later.");

            $article = new Article();
            $article->m_article_id = $request['article_category'];
            $article->title = $request['article_title'];
            $article->subtitle = $request['article_sub_title'];
            $article->description = $request['article_description'];
            $article->description_html = $request['article_description_html'];
            $article->file_path = "uploads/article/".$fileName;
            $article->file_name = $fileName;

            if(!$article->save()) throw new Exception("Whoops! Sorry something went wrong, try again later.");

            $response['status'] = true;
            $response['message'] = "Successfully create new article";

            return $response;

        }
        catch(Exception $ex)
        {
            $response['status'] = false;
            $response['message'] = $ex->getMessage();

            return $response;
        }
    }

    public function getDetailArticle(array $data)
    {
        $response = array();

        try
        {
            if(empty($data)) throw new Exception("Whoop! Parameter can't be empty");

            $article = Article::find($data['article_id']);

            if(empty($article)) throw new Exception("Whoop! Article not found");

            $response['status'] = true;
            $response['data']   = $article;
        }
        catch(\Exception $ex)
        {
            $response['status']  = false;
            $response['message'] = $ex->getMessage();
        }

        return $response;
    }

    public function saveEditArticle(Request $request)
    {
        $response = array();

        \DB::beginTransaction();

        try
        {
            if(empty($request->all())) throw new Exception("Whoop! Parameter can't be empty.");

            $article = Article::find($request['article_id']);

            if(empty($article)) throw new Exception("Whoop! Article not found");


            if($request->hasFile('file'))
            {
                Storage::disk('upload_article')->delete($article->file_name);
                
                $file = $request->file('file');

                $fileName = \Str::random(12).".".$file->getClientOriginalExtension(); 

                if(!Storage::disk('upload_article')->put($fileName, file_get_contents($file))) throw new Exception("Whoops! Sorry something went wrong, try again later.");

                $article->file_path    = "uploads/article/".$fileName;
                $article->file_name    = $fileName;
            }
            
            $article->m_article_id     = $request['article_category'];
            $article->title            = $request['article_title'];
            $article->subtitle         = $request['article_sub_title'];
            $article->description      = $request['article_description'];
            $article->description_html = $request['article_description_html'];
            

            if(!$article->save()) throw new Exception("Whoops! Sorry something went wrong, try again later.");

            $response['status'] = true;
            $response['message'] = "Successfully edit current article";
        }
        catch(\Exception $ex)
        {
            \DB::rollback();
            $response['status'] = false;
            $response['message'] = $ex->getMessage();
        }

        return $response;
    }

    public function deleteCurrentArticle(array $data)
    {
        $response = array();
        \DB::beginTransaction();
        try
        {
            if(empty($data)) throw new Exception("Whoop! Parameter can't be empty.");

            $article = Article::find($data['article_id']);

            if(empty($article)) throw new Exception("Whoop! Article not found");

            if(!$article->delete()) throw new Exception("Whoop! Sorry something went wrong, try again later.");

            if(!Storage::disk('upload_article')->delete($article->file_name)) throw new Exception("Whoop! Sorry something went wrong, try again later.");

            $response['status'] = true;
            $response['message'] = "Successfully delete selected article.";
        }
        catch(\Exception $ex)
        {
            \DB::rollback();
            $response['status'] = false;
            $response['message'] = $ex->getMessage();
        }
        \DB::commit();

        return $response;
    }

    /** ============ PROMO ======== */
    public function getAllPromo()
    {
        $response = array();

        $product = Promo::all();

        if(empty($product))
        {
            $response['status']  = false;
            $response['message'] = "Whoop! Current there's no promo yet";
        }
        else
        {
            $response['status'] = true;
            $response['data']   = $product;
        }

        return $response;
    }

    public function GetLatestPromo() {
        $promo = Promo::orderBy('created_at', 'desc')->take(1)->get();

        if($promo->isempty()) {
            return \response()->json(array(
                "status"  => false,
                "message" => "Whoops! Empty promo"
            ));
        } else {
            return \response()->json(array(
                "status" => true,
                "data"   => $promo
            ));
        }
    }

    public function getDetailPromo(array $data)
    {
        $response = array();

        $promo = Promo::find($data['promo_id']);

        if(empty($promo))
        {
            $response['status'] = false;
            $response['message'] = "Whoop! Promo not found";
        }
        else
        {
            $response['status'] = true;
            $response['data'] = $promo;
        }

        return $response;
    }

    public function addNewPromo(Request $request)
    {
        $response = array();
        \DB::beginTransaction();
        try
        {
            if(empty($request->all())) throw new Exception("Whoop! Parameter can't be empty.");

            if(!$request->hasFile('file')) throw new Exception("Product should have an image to continue this process.");

            $file = $request->file('file');

            $fileName = \Str::random(12).".".$file->getClientOriginalExtension();

            if(!Storage::disk('upload_promo')->put($fileName, file_get_contents($file))) throw new Exception("Whoops! Sorry something went wrong, try again later.");

            $promo = new Promo();
            $promo->name = $request['promo_name'];
            $promo->end_at = $request['promo_end_at'];
            $promo->file_path = "uploads/promo/".$fileName;
            $promo->file_name = $fileName;
            $promo->status = "active";

            if(!$promo->save()) throw new Exception("Whoop! Sorry something went wrong, try again later.");

            $response['status'] = true;
            $response['message'] = "Successfully add new promo";
        }
        catch(\Exception $ex)
        {
            \DB::rollback();
            $response['status'] = false;
            $response['message'] = $ex->getMessage();
        }
        \DB::commit();

        return $response;
    }

    public function saveEditPromo(Request $request)
    {
        $response = array();

        \DB::beginTransaction();

        try
        {
            if(empty($request->all())) throw new Exception("Whoop! Parameter can't be empty.");

            $promo = Promo::find($request['promo_id']);

            if(empty($promo)) throw new Exception("Whoop! Article not found");


            if($request->hasFile('file'))
            {
                Storage::disk('upload_article')->delete($promo->file_name);
                
                $file = $request->file('file');

                $fileName = \Str::random(12).".".$file->getClientOriginalExtension(); 

                if(!Storage::disk('upload_promo')->put($fileName, file_get_contents($file))) throw new Exception("Whoops! Sorry something went wrong, try again later.");

                $promo->file_path    = "uploads/article/".$fileName;
                $promo->file_name    = $fileName;
            }
            
            $promo->name   = $request['promo_name'];
            $promo->end_at = $request['promo_end_at'];
            

            if(!$promo->save()) throw new Exception("Whoops! Sorry something went wrong, try again later.");

            $response['status'] = true;
            $response['message'] = "Successfully edit current article";
        }
        catch(\Exception $ex)
        {
            \DB::rollback();
            $response['status'] = false;
            $response['message'] = $ex->getMessage();
        }

        return $response;
    }

    public function deleteCurrentPromo(array $data)
    {
        $response = array();
        \DB::beginTransaction();
        try
        {
            if(empty($data)) throw new Exception("Whoop! Parameter can't be empty.");

            $promo = Promo::find($data['promo_id']);

            if(empty($promo)) throw new Exception("Whoop! Promo not found");

            if(!$promo->delete()) throw new Exception("Whoop! Sorry something went wrong, try again later.");

            if(!Storage::disk('upload_promo')->delete($promo->file_name)) throw new Exception("Whoop! Sorry something went wrong, try again later.");

            $response['status']  = true;
            $response['message'] = "Successfully delete selected promo.";
        }
        catch(\Exception $ex)
        {
            \DB::rollback();
            $response['status']  = false;
            $response['message'] = $ex->getMessage();
        }
        \DB::commit();

        return $response;
    }

    /** ==== Testimoni ==== */
    public function getAllTestimoni()
    {
        $response = array();

        $testimoni = Testimoni::all();

        if(empty($testimoni))
        {
            $response['status']  = false;
            $response['message'] = "Whoop! Current there's no promo yet";
        }
        else
        {
            $response['status'] = true;
            $response['data']   = $testimoni;
        }

        return $response;
    }
    
    public function addNewTestimoni(Request $request)
    {
        $response = array();

        \DB::beginTransaction();
        try
        {
            if(empty($request->all())) throw new Exception("Whoop! Parameter can't be empty.");

            if(!$request->hasFile('file')) throw new Exception("Product should have an image to continue this process.");

            $file = $request->file('file');

            $fileName = \Str::random(12).".".$file->getClientOriginalExtension();

            if(!Storage::disk('upload_testimoni')->put($fileName, file_get_contents($file))) throw new Exception("Whoops! Sorry something went wrong, try again later.");

            $testimoni = new Testimoni();
            $testimoni->file_path = "uploads/testimoni/".$fileName;
            $testimoni->file_name = $fileName;

            if(!$testimoni->save()) throw new Exception("Whoop! Sorry something went wrong, try again later.");

            $response['status'] = true;
            $response['message'] = "Successfully add new testimoni";
        }
        catch(\Exception $ex)
        {
            \DB::rollback();
            $response['status'] = false;
            $response['message'] = $ex->getMessage();
        }
        \DB::commit();
    
        return $response;
    }

    public function deleteCurrentTestimoni(array $data)
    {
        $response = array();
        \DB::beginTransaction();
        try
        {
            if(empty($data)) throw new Exception("Whoop! Parameter can't be empty.");

            $testimoni = Testimoni::find($data['testimoni_id']);

            if(empty($testimoni)) throw new Exception("Whoop! Promo not found");

            if(!$testimoni->delete()) throw new Exception("Whoop! Sorry something went wrong, try again later.");

            if(!Storage::disk('upload_testimoni')->delete($testimoni->file_name)) throw new Exception("Whoop! Sorry something went wrong, try again later.");

            $response['status']  = true;
            $response['message'] = "Successfully delete selected testimoni.";
        }
        catch(\Exception $ex)
        {
            \DB::rollback();
            $response['status']  = false;
            $response['message'] = $ex->getMessage();
        }
        \DB::commit();

        return $response;
    }
    

    // == new ==
    public function customerConfirmOrder(array $data) {
        $results = [];
        
        try {
            if(empty($data)) throw new Exception("Whoops parameter cannot be empty");
            $customerProfile = new CustomerProfile;
            $customerProfile->name = $data['txt-fullname'];
            $customerProfile->email = $data['txt-email'];
            $customerProfile->alamat = $data['txt-alamat'];
            $customerProfile->kecamatan = $data['txt-kecamatan'];
            $customerProfile->kota = $data['txt-kota'];
            $customerProfile->kode_pos = $data['txt-kodepos'];
            $customerProfile->phone_number = "62".substr($data['txt-phone_number'], 1, strlen($data['txt-phone_number']));
            $customerProfile->status = "active";
            if(!$customerProfile->save()) throw new Exception("Whoops something went wrongg. Try again later");
          
            foreach(json_decode($data['products']) as $product){
                $customerOrder = new CustomerOrder;
                $customerOrder->customer_id = $customerProfile->id;
                $customerOrder->product_id = $product->product_id;
                $customerOrder->total_order = $product->product_total;
                $customerOrder->status = "not-contacted" ;

                if(!$customerOrder->save()) throw new Exception("Whoops something went wrong. Try again later");
            }

            $results["status"] = true;
            $results["message"] = "Pesanan kamu berhasil dibuat! Silahkan menunggu kabar selanjutnya dari Admin Lalemon, untuk info lebih lanjut dapat menghubungi nomor berikut 08568151996. Pastikan anda telah menyimpan nomor ini sebelum menutup modal. Terima kasih";
        } catch (Exception $ex){
            $results["status"] = false;
            $results["message"] = $ex->getMessage();
        }

        return $results;
    }

    public function getCustomerDetail() {
        $results = [];

        try {
            $customerData = 
                DB::table('m_customer_order AS order')
                ->select(DB::raw('
                    SUM(CASE WHEN order.id IS NOT NULL THEN order.total_order ELSE 0 END) AS total_order,
                    date(order.created_at) as date
                '))->groupBy('date')->orderBy('date', 'asc')->get()->toArray();
            if(empty($customerData)) throw new Exception("Whoops something went wrong while gathering data. Try again later");

            $results['status'] = true;
            $results['data'] = $customerData;
                    
        }
        catch (Exception $ex) {
            $results['status'] = false;
            $results['message'] = $ex->getMessage();
        }
        return $results;
    }

    public function getListCustomer() {
        $results = [];

        try {
            
            $customerData = 
                DB::table('m_customer_order AS order')
                ->join('m_customer_profile AS profile', 'profile.id', '=', 'order.customer_id')
                ->join('product AS p', 'p.id', '=', 'order.product_id')
                ->select(DB::raw('
                        order.id AS order_id,
                        profile.name,
                        profile.email,
                        CONCAT(profile.alamat,", ",profile.kota,", ",profile.kecamatan,", ",profile.kode_pos) AS alamat,
                        date(order.created_at) AS order_date,
                        profile.phone_number,
                        GROUP_CONCAT(CONCAT(p.name, "(", order.total_order, ")") SEPARATOR ", ") AS order_detail,
                        SUM(CASE WHEN order.id IS NOT NULL THEN order.total_order ELSE 0 END) AS total_order,
                        SUM(CASE WHEN order.id IS NOT NULL THEN order.total_order * p.price ELSE 0 END) AS total_price,
                        p.price AS product_price,
                        order.status AS status_order
                '))
                ->groupBy(['profile.id', 'order_date'])
                ->orderBy('order.created_at', 'asc')
                ->get();


            if($customerData->isEmpty()) throw new Exception("Whoops something went wrong while gathering data. Try again later");

            $results["status"] = true;
            $results["data"] = $customerData;

        } catch (Exception $ex) {
            $results["status"] = false;
            $results["message"] = $ex->getMessage();
        }
        
        return $results;
    }

    public function updateOrderStatus(array $data) {
        $results = [];

        try {
            if(empty($data)) throw new Exception("Whoops parameter cannot be empty");

            $customer_order = CustomerOrder::find($data['order_id']);

            if(empty($customer_order)) throw new Exception("Whoops something went wrong while gathering data. Try again later");

            $customer_order->status = "contacted";

            if(!$customer_order->save()) throw new Exception("Whoops something went wrong. Try again later");

            $results['status'] = true;
            $results['message'] = "Successfully update";
        }
        catch (Exception $ex) {
            $results['status'] = false;
            $results['message'] = $ex->getMessage();
        }

        return $results;
    }
}

