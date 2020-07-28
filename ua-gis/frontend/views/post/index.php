<?php
    if (isset($_SESSION['isAuth'])) {
?>
        <p></p>
        <div class="row">
            <div class="col-md-12">
            <a href="/post/create" type="button" class="btn btn-success w-100">ДОБАВИТЬ ПОСТ</a>
            </div>
        </div>
<?php
    }
?>

<p></p>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead class="thead-dark text-center">
                <tr>
                    <th>
                        Дата
                    </th>
                    <th>
                        Автор
                    </th>
                    <th>
                        Пост
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
            <tbody>

<?php
    foreach ($model as $value){
?>
                <tr>
                    <td><?=$value->date?></td>
                    <td><?=$value->autor?></td>
                    <td><?=$value->post?></td>
                    <td><a href="/post/item?id=<?=$value->id?>">Детально</a></td>
                </tr>
<?php
    }
?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example" class="mx-auto" style="width: 200px;">
            <form action="" method="GET">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="/post/pagination?page=<?=$page_active-1?>">Предыдущая</a></li>
                <?php
                    for ($i = 1; $i <= $page; $i++) {
                        if ($page_active == $i){
                            echo "<li class='page-item active'><a class='page-link' href='/post/pagination?page=$i'>$i</a></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link' href='/post/pagination?page=$i'>$i</a></li>";
                        }
                    }
                ?>
                    <li class="page-item"><a class="page-link" href="/post/pagination?page=<?=$page_active+1?>">Следующая</a></li>
                </ul>
            </form>
        </nav>
    </div>
</div>