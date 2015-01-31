<?php

namespace Administrator;
use Repositories\Administrator\InvoiceRepository;

class InvoiceController extends \BaseController
{

    protected $layout = 'admin.layouts.main';
    protected $breadcrumbs = ['Dashboard' => '/', 'Invoices' => 'invoice'];
    protected $invoice;

    public function __construct(InvoiceRepository $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Display a listing of the resource.
     * GET /invoice
     *
     * @return Response
     */
    public function index()
    {
        $invoices = $this->invoice->getAll()->paginate(10);
        $this->layout->content = \View::make('admin.invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     * GET /invoice/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /invoice
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /invoice/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $invoice = $this->invoice->findById($id);
        $seller = $invoice->user;
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.invoices.show', compact('invoice', 'seller'));
    }

    /**
     * Show the form for editing the specified resource.
     * GET /invoice/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /invoice/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /invoice/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}