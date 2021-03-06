<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'Monitoring KW';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <header>
        <div class="container text-center">
            <a href="https://cakephp.org/" target="_blank" rel="noopener">
                <img alt="Logo" src="https://www.svgrepo.com/show/343871/select-product-ecommerce-item.svg"
                    width="350" />
            </a>
            <h1>
                Ksi??gi Wieczyste - lokalne
            </h1>
        </div>
    </header>
    <main class="main">
        <style>
        a.button {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-weight: 400;
            color: #191970;
            font: bold 12px Helvetica;
            text-decoration: none;
            padding: 7px 25px;
            position: relative;
            display: inline-block;
            text-shadow: 0 1px 0 #fff;
            -webkit-transition: border-color .218s;
            -moz-transition: border .218s;
            -o-transition: border-color .218s;
            transition: border-color .218s;
            background: #191970;
            background: -webkit-gradient(linear, 0% 40%, 0% 70%, from(#F5F5F5), to(#F1F1F1));
            background: -moz-linear-gradient(linear, 0% 40%, 0% 70%, from(#F5F5F5), to(#F1F1F1));
            border: solid 1px #dcdcdc;
            border-radius: 2px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            margin-right: 20px;
            cursor: pointer;
        }

        a.button:hover {
            color: #333;
            border-color: #999;
            -moz-box-shadow: 0 2px 0 rgba(0, 0, 0, 0.2);
            -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
        }

        a.button:active {
            color: #000;
            border-color: #444;
        }
        </style>
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="column">
                        <div class="column">
                            <td align="center">
                            <?php echo $this->Html->link("Dodaj CSV klienta", array('controller' => 'getrecords','action'=> 'addcsvtwo'), array( 'class' => 'button'))?>
                            <?php echo $this->Html->link("Dodaj klienta", array('controller' => 'clients','action'=> 'add'), array( 'class' => 'button'))?>
                            <?php echo $this->Html->link("Sprawd?? zmiany w??asno??ci", array('controller' => 'changeKw','action'=> 'index'), array( 'class' => 'button'))?>
                            <?php echo $this->Html->link("Zobacz wpisy ksi??g wieczystych", array('controller' => 'getrecords','action'=> 'index'), array( 'class' => 'button'))?>
<!--                            do generowania raport??w-->
                            <?php echo $this->Html->link("Wygeneruj raport", array('controller' => 'changeKw','action'=> 'generatereport'), array( 'class' => 'button'))?>
                            <form method="POST" action='getrecords/node'> <button type="submit" class="btn btn-success"> Run </button>
                            <?php //echo $this->Html->link("Run the script", array('controller' => 'getrecords','action'=> 'node'), array( 'class' => 'btn'))?>
    
                            <form id="myform" method="post">
                                <button type="submit" id="btn1" value="send"> Button </button>
                            </form>

                            <script>
                                src = 'jquery.js'
                                src = 'socket.io/socket.io.js' //path is C:\Users\zmarl\PhpstormProjects\land.re4\app\node\node_modules\socket.io\client-dist\socket.io.js
                                $(document).ready(function () {
                                    var socket = io.connect('http"//land.reg:8080')
                                    socket.on('data')
                                    

                                    //get button by ID
                                    $('#btn1').submit(function () {
                                        var foo = 'test value'
                                        //call a function with parameters
                                        $.ajax({
                                            url: 'http://land.reg:8080/puppeteer', 
                                            type: 'POST',
                                            timeout: '12000',
                                            datatype: 'text',
                                            data: foo
                                        });
                                    });
                                });

                            </script>

                        </td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
