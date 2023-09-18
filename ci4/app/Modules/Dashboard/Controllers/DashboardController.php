<?php

namespace Dashboard\Controllers;

use Dashboard\Models\DashboardModel;
// use Dashboard\Controllers\BaseController1;

class DashboardController extends BaseController {

    public $data = [];

    /**
     * Constructor.
     *
     */
    public function __construct() {
//
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): void {
        $salutation = salutation();
        $data['menus'] = prepareMenu();

        echo view('Dashboard\Views\\'.getenv('theme.backend.path') . 'main/header', $data);
        echo view('Dashboard\Views\\'.getenv('theme.backend.path') . 'form/index');
        echo view('Dashboard\Views\\'.getenv('theme.backend.path') . 'main/footer');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $this->data['title'] = 'Create Dashboard';
        $this->data['body']['class'] = "page-has-left-panels page-has-right-panels";

        return view('layouts/app/header.php', $this->data)
                . view('Dashboard\Views\create', $this->data)
                . view('layouts/app/footer.php', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store() {
        helper(['form']);

        $request = $this->request->getPost();

        // $request['slug_'] = url_title($request['title'], '-', true);

        if (isset($request['active']) and $request['active'] == 'on') {
            $request['active'] = 1;
        } else {
            $request['active'] = 0;
        }

        $model = model(DashboardModel::class);

        if (!$model->insert($request)) {
            session()->setFlashdata('errors', $model->errors());
            return redirect()->back()->withInput();
        } else {
            session()->setFlashdata('status', 'Record created successfully.');
        }

        return redirect('dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     */
    public function show($id) {
        $this->data['dashboard'] = model(DashboardModel::class)->find($id);

        $this->data['title'] = $this->data['dashboard']->title ?? 'Dashboards';
        $this->data['body']['class'] = "page-has-left-panels page-has-right-panels";

        return view('layouts/app/header.php', $this->data)
                . view('Dashboard\Views\show', $this->data)
                . view('layouts/app/footer.php', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     */
    public function edit($id) {
        $this->data['dashboard'] = model(DashboardModel::class)->find($id);

        $this->data['title'] = $this->data['dashboard']->title ?? 'Dashboards';
        $this->data['body']['class'] = "page-has-left-panels page-has-right-panels";

        return view('layouts/app/header.php', $this->data)
                . view('Dashboard\Views\edit', $this->data)
                . view('layouts/app/footer.php', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     */
    public function update($id) {
        $model = model(DashboardModel::class)->find($id);

        if (!$model) {
            session()->setFlashdata('error', 'Record not found.');
            return;
        }

        $request = $this->request->getPost();

        if (isset($request['active']) and $request['active'] == 'on') {
            $request['active'] = 1;
        } else {
            $request['active'] = 0;
        }

        model(DashboardModel::class)->update($id, $request);

        session()->setFlashdata('status', 'Record updated successfully.');
        return redirect('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     */
    public function delete($id) {
        $model = model(DashboardModel::class)->find($id);

        if (!$model) {
            session()->setFlashdata('error', 'Record not found.');
            return;
        }

        model(DashboardModel::class)->delete($model['id']);

        return redirect('dashboard.index');
    }
}
