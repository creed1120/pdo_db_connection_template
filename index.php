<?php
/*
 * Template Name: Table Data Filter Template
 * Template Post Type: page
 */

 // A second way of Instantiating the Connection Class
 // $connection = require_once get_stylesheet_directory() . "/project-database/db-connection.php";

 require_once "assets/style.css";
 require_once "./pdo-db-connection.php";
 $connection = new Connection;

 // Methods from Connection Class that is required above
 // $tbl_standards = $connection->getStandards();
 // $tbl_streams = $connection->getStreams();
 // $tbl_gender = $connection->getGender();
 // $tbl_data = $connection->getData();

 get_header();
// Adds custom CSS to page
//  data_filter_css();
 ?>

<div class="container">
    <h1 class="my-5">Table Data Filter Template</h1>

    <section id="filter-inputs" class="mb-5">
    <form>
        <div class="form-row align-items-end">
            <div class="form-group col-md-3">
                <label for="inputState">Standard</label>
                <select id="inputState" class="form-control">
                    <span class="dropdown-carat"></span>
                    <option selected>Select Standard</option>
                    <?php if (count($connection->getStandards()) > 0 ) : ?>
                        <?php foreach ($connection->getStandards() as $standard) : ?>
                            <option>
                                <?php echo $standard['standard'] ?>
                            </option>
                        <?php  endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputState">Stream</label>
                <select id="inputState" class="form-control">
                <span class="dropdown-carat"></span>
                    <option selected>Select Stream</option>
                    <?php foreach ($connection->getStreams() as $stream) : ?>
                        <option>
                            <?php echo $stream['stream'] ?>
                        </option>
                    <?php  endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputState">Gender</label>
                <select id="inputState" class="form-control">
                <span class="dropdown-carat"></span>
                    <option selected>Select Gender</option>
                    <?php foreach ($connection->getGender() as $gender) : ?>
                        <option>
                            <?php echo $gender['gender'] ?>
                        </option>
                    <?php  endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>
    </section>

    <div class="table-responsive mb-5">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Fname</th>
                <th scope="col">Lname</th>
                <th scope="col">Standard</th>
                <th scope="col">Stream</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($connection->getData()) > 0) : ?>
                    <?php foreach ($connection->getData() as $data) : ?>
                        <tr>
                            <td><?php echo $data['id'] ?></td>
                            <td><?php echo $data['fname'] ?></td>
                            <td><?php echo $data['lname'] ?></td>
                            <td><?php echo $data['standard'] ?></td>
                            <td><?php echo $data['stream'] ?></td>
                            <td><?php echo $data['gender'] ?></td>
                            <td><?php echo $data['email'] ?></td>
                            <td><?php echo $data['mobile'] ?></td>
                        </tr>
                    <?php  endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<?php get_footer(); ?>