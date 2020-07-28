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
                        Статус
                    </th>
                    <th colspan="3">
                        Действия
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
                    <td><?=($value->approval) ? 'Подтверждено' : 'Не подтверждено'?></td>
                    <td><a href="/post/item?id=<?=$value->id?>">Детально</a></td>
                    <td><a href="/post/delete?id=<?=$value->id?>">Удалить</a></td>
                    <?php
                        if ($value->approval){
                            echo '<td></td>';
                        } else {
                            echo "<td><a href='/post/approval?id=$value->id'>Подтвердить</a></td>";
                        }
                    ?>
                    
                </tr>
<?php
    }
?>
            </tbody>
        </table>
    </div>
</div>