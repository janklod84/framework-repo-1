<?php 

public function index()
{    

    # Подготовка качества параметры для Рагинации
    // $page = $this->get('page') ?? 1;
    // $total = $this->taskCount();
    // $perpage = 3;
    
    // # инициализуем нашу пагинацию
    // $pagination = new BPagination($page, $perpage, $total);
    // $start = $pagination->getStart();
    
    //$tasks = $this->task->paginate("$start, $perpage");
    
    $tasks = $this->task->all();
    HTML::setTitle('Главная');
        $this->render('task/index', compact('tasks', 'pagination', 'total'));
}
