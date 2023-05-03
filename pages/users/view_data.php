<?php
if (isset($result) && $result->rowCount() != 0) :
?>
    <div class="m-2 p-2">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "
                    <tr scope='row'> 
                        <td> " . $row['nome'] . " </td>
                        <td> " . $row['idade'] . " </td>
                        <td> " . $row['nascimento'] . " </td>
                        <td> " . $row['email'] . " </td>
                    </tr>
                   ";
                }
                ?>
            </tbody>
        </table>
    </div>
<?php else :
    echo "<div class='divInfo'>
        <h5 class='card-title'> Nenhum cadastro realizado </h5>
        </div>";
endif;
?>