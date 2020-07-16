<?php

namespace App\Http\Controllers;

use App\Modules\Admin\Repository\AdminRepository;
use Illuminate\Http\Request;
use Hash;
use Auth;

class MainController extends Controller
{
    private $adminRepo;

    public function __construct()
    {
        $this->adminRepo = new AdminRepository();
    }
    /**
     * @param --
     * 
     * @return view
     */
    public function index()
    {
        $data = array();
        $data['promo']   = $this->adminRepo->GetLatestPromo()->getData();
        $data['artikel'] = $this->adminRepo->getAllArticle();
        return view('pages.home')->with($data);
    }

    /**
     * @param --
     * 
     * @return view
     */
    public function showDetailTopic()
    {
        $data = array();
        $data['artikel'] = $this->adminRepo->getAllArticle();
        // dd($data['artikel']);
        return view('pages.detail-topic')->with($data);
    }

    /**
     * @param None
     * @return view
     */
    public function ShowTopic($article_id) {
        $data = array();
        $data['artikel'] = $this->adminRepo->getArticleById($article_id);
        return view('pages.topic')->with($data);
    }

    /**
     * @param --
     * 
     * @return view
     */
    public function showListProduct()
    {
        $data = array();
        $data['products'] = $this->adminRepo->getAllProduct();
        return view('pages.products')->with($data);
    }

    public function customerConfirmOrder(Request $request) {
        return \response()->json($this->adminRepo->customerConfirmOrder($request->all()));
    }

    /**
     * @param --
     * 
     * @return view
     */
    public function showContactUsPage()
    {
        return view('pages.contact-us');
    }

    /** 
     * @param --
     * 
     * @return view
     */
    public function showTestimoniPage()
    {
        $data = array();
        $data['testimonis'] = $this->adminRepo->getAllTestimoni();
        return view('pages.testimoni')->with($data);
    }

    /** ============================ ADMINISTRATIVE ============================== */
    public function showDashboardPage() {
        return view('administrative.dashboard');
    }

    public function getCustomerDetail() {
        return \response()->json($this->adminRepo->getCustomerDetail());
    }

    public function showManageCustomerPage() {
        $data = array();
        $data['list_customer'] = $this->adminRepo->getListCustomer();
        return view('administrative.manage-customer')->with($data);
    }

    public function updateOrderStatus(Request $request) {
        return \response()->json($this->adminRepo->updateOrderStatus($request->all()));
    }
    /**
     * @param --
     * 
     * @return view
     */
    public function showLoginPage()
    {
        // $data = array();
        // $data['username'] = 'u172447_lalemon';
        // $data['password'] = Hash::make('Lalemon123!');
        // $data['status'] = 1;

        // dd($data);
        return view('administrative.login');
    }

    public function validateUser(Request $request) 
    {
        $responses = $this->adminRepo->valdiateUser($request->all());

        if($responses['status']) return redirect('/add-product');
        else return redirect('/home');
    }

    public function doLogout()
    {
        Auth::logout();

        return redirect('/admin/login');
    }

    /** 
     * @param --
     * 
     * @return view
     */
    public function showAddProductPage()
    {
        $product = $this->adminRepo->getAllProduct();
        return view('administrative.add-product', compact(array('product')));
    }

    /** 
     * @param --
     * 
     * @return view
     */
    public function showAddArtikelPage()
    {
        $categoryArticles = $this->adminRepo->getArticleCategory();
        $articles = $this->adminRepo->getAllArticle();
        return view('administrative.add-artikel', compact(array('categoryArticles', 'articles')));
    }

    /** 
     * @param --
     * 
     * @return view
     */
    public function showAddTestimoniPage()
    {
        $data = array();
        $data['testimonis'] = $this->adminRepo->getAllTestimoni(); 
        return view('administrative.add-testimoni')->with($data);
    }

    /** 
     * @param --
     * 
     * @return view
     */
    public function showAddPromoPage()
    {
        $data = array();
        $data['promos'] = $this->adminRepo->getAllPromo();
        return view('administrative.add-promo')->with($data);
    }

    /**
     * @param txt-add-name__product, txt-add-description__product, cb-add-file__product
     * 
     * @return status, messages
     */
    public function addNewProduct(Request $request)
    {   
        return response()->json($this->adminRepo->addNewProduct($request));
    }

    /**
     * @param product_id
     * 
     * @return array of Product
     */
    public function getProductDetail(Request $request)
    {
        return response()->json($this->adminRepo->getProductDetail($request->all()));
    }

    /**
     * @param txt-add-name__product, txt-add-description__product, cb-add-file__product
     * 
     * @return status, messages
     */
    public function saveEditProduct(Request $request)
    {   
        return response()->json($this->adminRepo->saveEditProduct($request));
    }

    /**
     * @param product_id
     * 
     * @return status, message
     */
    public function deleteCurrentProduct(Request $request)
    {
        return \response()->json($this->adminRepo->deleteCurrentProduct($request->all()));
    }

    /**================== ARTICLE ============= */
    /**
     * @param article_category, article_title, article_sub_title, article_description, file
     * 
     * @return status, message
     */
    public function addNewArticle(Request $request)
    {
        return \response()->json($this->adminRepo->addNewArticle($request));
    }

    /**
     * @param article_id
     * 
     * @return data of article
     */
    public function getDetailArticle(Request $request)
    {
        return \response()->json($this->adminRepo->getDetailArticle($request->all()));
    }

    /**
     * @param article_category, article_title, article_sub_title, article_description, file
     * 
     * @return status, message
     */
    public function saveEditArticle(Request $request)
    {
        return \response()->json($this->adminRepo->saveEditArticle($request));
    }

    /**
     * @param article_id
     * 
     * @return status, message
     */
    public function deleteCurrentArticle(Request $request)
    {
        return \response()->json($this->adminRepo->deleteCurrentArticle($request->all()));
    }

    /** ====================== PROMO =================== */
    /**
     * @param promo_id
     * 
     * @return status, data (TRUE), status, message (FALSE)
     */
    public function getDetailPromo(Request $request)
    {
        return \response()->json($this->adminRepo->getDetailPromo($request->all()));
    }

    /**
     * @param promo_name, promo_end_at, file
     * 
     * @return status, message
     */
    public function addNewPromo(Request $request)
    {
        return \response()->json($this->adminRepo->addNewPromo($request));
    }
    
    /**
     * @param promo_name, promo_end_at, file
     * 
     * @return status, message
     */
    public function saveEditPromo(Request $request)
    {
        return \response()->json($this->adminRepo->saveEditPromo($request));
    }

    /**
     * @param promo_id
     * 
     * @return status, message
     */
    public function deleteCurrentPromo(Request $request)
    {
        return \response()->json($this->adminRepo->deleteCurrentPromo($request->all()));
    }

    /** ==== Testimoni === */
    /**
     * @param file
     * 
     * @return status, message
     */
    public function addNewTestimoni(Request $request)
    {
        return \response()->json($this->adminRepo->addNewTestimoni($request));
    }

    /**
     * @param testimoni_id
     * 
     * @return status, message
     */
    public function deleteCurrentTestimoni(Request $request)
    {
        return \response()->json($this->adminRepo->deleteCurrentTestimoni($request->all()));
    }
}
