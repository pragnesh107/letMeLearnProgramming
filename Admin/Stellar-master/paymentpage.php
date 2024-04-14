<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Programming Blog Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="./vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="./css/style.css">
  <!-- <link rel="shortcut icon" href="./images/favicon.png" /> -->
</head>

<body>
  <div class="container-scroller">
  <?php include_once('header.php'); 
  ?>
            <div class="main-panel">
                <div class="content-wrapper">
                <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Payment Details</h4>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center"> Payment Id </th>
                                                <th class="text-center"> User Id </th>
                                                <th class="text-center"> Package Id </th>
                                                <th class="text-center"> Payment Status </th>
                                                <th class="text-center"> Payment Method </th>
                                                <th class="text-center"> Payment Amount </th>
                                                <th class="text-center"> Date/Time </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td class="text-center">6</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">Success</td>
                                                <td class="text-center">Debit Card</td>
                                                <td class="text-center">99</td>
                                                <td class="text-center">2023-01-30 17:53:34</td>
                                            </tr>   
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td class="text-center">3</td>
                                                <td class="text-center">2</td>
                                                <td class="text-center">Success</td>
                                                <td class="text-center">Debit Card</td>
                                                <td class="text-center">349</td>
                                                <td class="text-center">2023-02-20 10:10:34</td>
                                            </tr>   
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td class="text-center">4</td>
                                                <td class="text-center">2</td>
                                                <td class="text-center">Success</td>
                                                <td class="text-center">Net Banking</td>
                                                <td class="text-center">349</td>
                                                <td class="text-center">2023-01-10 15:10:12</td>
                                            </tr>   
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">4</td>
                                                <td class="text-center">8</td>
                                                <td class="text-center">3</td>
                                                <td class="text-center">Success</td>
                                                <td class="text-center">Paypal</td>
                                                <td class="text-center">559</td>
                                                <td class="text-center">2023-01-15 08:15:34</td>
                                            </tr>   
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">5</td>
                                                <td class="text-center">10</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">Success</td>
                                                <td class="text-center">Debit Card</td>
                                                <td class="text-center">99</td>
                                                <td class="text-center">2023-03-25 15:35:25</td>
                                            </tr>   
                                        </tbody>    
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>  

                </div>
            </div>
    </div>
</div>
    <script src="./vendors/js/vendor.bundle.base.js"></script>
    <script src="./js/off-canvas.js"></script>
    <script src="./js/misc.js"></script>
</body>
</html>
