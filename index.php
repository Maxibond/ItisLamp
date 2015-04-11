	

    <html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     
    </head>
    <body style="padding-top:10px;">
    <div class="container" >
            <div class="row">
            <form method="post" action="index.php" class="form-horizontal">
            <div class="form-group">
                    <label class="col-sm-2 control-label">ФИО</label>
                    <div class="col-sm-10">
                            <input type="text" name="fio" class="form-control">
                    </div>
        </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">Выберите продукт</label>
                    <div class="col-sm-10">
                            <select name="prod" class="form-control">
                                    <option value="milk">Молоко 30р</option>
                                    <option value="juice">Сок 60р</option>
                                    <option value="bread">Хлеб 15р</option>
                                    <option value="tea">Чай 50р</option>
                                    <option value="sugar">Сахар 20р</option>
                                    <option value="choco">Шоколад 40р</option>
                            </select>
                    </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">Кол-во</label>
                            <div class="col-sm-10">
                                    <input type="text" name="num" class="form-control">
                            </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">Ваш комментарий</label>
                    <div class="col-sm-10">
                            <input type="text" name="com" class="form-control">
                    </div>
            </div>
            <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-primary" type="submit" style="width:200px;">Отправить данные</button>
                            </div>
                   
            </div>
    </form>
    <?php
     
            if(isset($_POST['fio'])&&$_POST['fio']!=null)
            {
                   
                    switch ($_POST['prod']) {
                            case 'milk':
                                    $price =30;
                                    $pro = 'Молока';
                                    break;
     
                                    case 'juice':
                                    $price =60;
                                    $pro = 'Сокф';
                                    break;
     
                                    case 'bread':
                                    $price =15;
                                    $pro='Хлеба';
                                    break;
     
                                    case 'tea':
                                    $price =50;
                                    $pro='Чая';
                                    break;
     
                                    case 'sugar':
                                    $price =20;
                                    $pro='Сахара';
                                    break;
     
                                    case 'choco':
                                    $price =40;
                                    $pro='Шоколада';
                                    break;
                           
                            default:
                                    break;
                    }
                    $price = $price*$_POST['num'];
                    $fio = $_POST['fio'];
                    $com = $_POST['com'];
                    echo <<<HERE
                    <p>Уважаемый(ая), <b>$fio</b></p>
                    <p>Сумма вашей покупки $pro: <b>$price</b> Рублей</p>
                    <p>Ваш комментарий мы обязательно учтем: <b>$com</b></p>
                    <p>Спасибо за покупку!</p>
    HERE;
                           
            }
    ?>
    </div>
    </div>
    </body>
    </html>

