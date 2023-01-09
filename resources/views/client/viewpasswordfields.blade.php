@extends('client_layout.master')

@section('title')
    View password
@endsection

@section('content')
    <!-- start page content -->
    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="user-sidebar">
                    <ul>
                        <a href="dashboard.php"><button class="btn btn-danger">Dashboard</button></a>
                        <a href="customer-profile-update.php"><button class="btn btn-danger">Update Profile</button></a>
                        <a href="customer-billing-shipping-update.php"><button class="btn btn-danger">Update Billing and Shipping Info</button></a>
                        <a href="customer-password-update.php"><button class="btn btn-danger">Update Password</button></a>
                        <a href="customer-order.php"><button class="btn btn-danger">Orders</button></a>
                        <a href="logout.php"><button class="btn btn-danger">Logout</button></a>
                    </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="user-content">
                    <h3 class="text-center">
                        Update Password                    
                    </h3>
                    <form action="" method="post">
                        <input type="hidden" name="_csrf" value="305e2e05d29f55b50a14ad09db8b623c" />                        
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">New Password *</label>
                                <input type="password" class="form-control" name="cust_password">
                                </div>
                                <div class="form-group">
                                <label for="">Retype New Password *</label>
                                <input type="password" class="form-control" name="cust_re_password">
                                </div>
                                <input type="submit" class="btn btn-primary" value="Update" name="form1">
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page content -->
@endsection