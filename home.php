<?php 
    include_once('header.php');
?>
<div class="contents">
    <a href="registerFarm.php">create farm</a>
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
                </div>
                <div class="col-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">TOP UPCOMING TASKS</h5>
                        <p class="card-text text-center mt-5">No Tasks Due</p>
                        <a href="#" class="card-link">View all Tasks</a>
                    </div>
                </div>
                </div> 
                <div class="col-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">RECENT ORDERS</h5>
                        <p class="card-text text-center mt-5">Not Enough Data to Chart</p>
                        <a href="#" class="card-link">View Orders</a>
                    </div>
                </div>
                </div>
                <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">INCOME VS EXPENSE</h5>
                        <p class="card-text text-center mt-5">Calendar</p>
                        <a href="#" class="card-link">Accounting</a>
                    </div>
                </div>
                </div>
                <div class="ccol-12">
                    <div card="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">User data</h5>
                            <p><?php echo $userData['username'] ?></p>
                            <p><?php echo $userData['email'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="ccol-12">
                    <div card="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Farms data</h5>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
               
<?php 
    include_once('footer.php');
?>