<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 08/01/2015
 * Time: 02:55 PM
 */
namespace Billing;
use Repositories\Administrator\InvoiceRepository;

class InvoiceController extends \BaseController
{

    protected $layout = 'admin.layouts.main';
    protected $invoice;

    public function __construct(InvoiceRepository $invoice)
    {
        $this->invoice = $invoice;
    }

    public function getIndex()
    {
        if (\Auth::check()) {
            $client_id = \Auth::user()->id;
            $user = \User::find($client_id);
            $seller = $user->first_name . " " . $user->last_name;
            $this->layout->content = \View::make('billing.invoice', compact('seller', 'client_id'));
        } else {
            \Redirect::to('login');
        }
    }

    public function postIndex()
    {
        $input = \Input::all();
        $match = $this->invoice->create($input);

        return \Response::json(['url' => \URL::to('invoice/' . $match->id), 'invoice' => $match->id]);
    }
}