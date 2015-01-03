<?php
namespace Administrator;

use Illuminate\Support\Facades\File;

class ConfigController extends \BaseController
{

    protected $layout = 'admin.layouts.main';

    /**
     * Display a listing of the resource.
     * GET /administrator/config
     *
     * @return Response
     */
    public function getIndex()
    {
        //
        $siteConfig = \Config::get('site');

        $this->layout->content = \View::make('admin.config.form', compact('siteConfig'));
    }

    /**
     * Update the specified resource in storage.
     * PUT /administrator/config/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function postUpdate()
    {
        $config = array_except(\Input::all(), ['_token']);
        $data = var_export($config, true);
        if (File::put(app_path() . '/config/site.php', "<?php\n\n return $data;")) {
            return \Redirect::to('/config');
        }
    }

}