<section class="">
            <div class="container">
                <div class="row card-deck">
                    <?php while($movie = $response->fetch()) {
                        ?>
                        <div class="col-4">
                            <div class="card mb-4 border-0 text-white">
                                <img src="<?php echo $movie['image'];?>" alt="..." class="card-img">
                                <div class="card-img-overlay">
                                <!-- <div class="card-body"> -->
                                    <h5 class="card-title"><?php echo $movie['title'];?></h5>
                                    <h6 class="card-subtitle mb-2">Movie id: <?php echo $movie['id'];?></h6>
                                    <p class="card-text">
                                        <?php echo $movie['content'];?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }?>
                </div>
            </div>
        </section>




        <div class="col-4">
                        <div class="card bg-transparent border-0 text-center text-white">
                            <div class="card-body p-0">
                                <img src="movies_poster/default.jpg" alt="..." class="card-img">
                                <div class="card-img-overlay">
                            </div>
                            <div class="card-footer bg-transparent">
                                <h5 class="card-title"><?php echo $movie['title'];?></h5>
                                <p class="card-text"><?php echo $movie['content'];?></p>
                            </div>
                        </div>
                    </div>


