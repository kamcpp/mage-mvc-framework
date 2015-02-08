<?php

class DeleteNewsController extends BaseController{

    public function get(Request $request){
        $id = $this->getSession("id");

        $newsDAO = Context::createEntityManager('NewsEntity');
        $newsDAO->delete($id);

        return new RedirectResponse("News");
    }
}
