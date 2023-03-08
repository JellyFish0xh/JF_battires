<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Admins Table</h6>
        <button class="btn btn-dark my-3">Insert</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Salary</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php $res = $conn->query("SELECT * FROM `admins`");
                ?>
                <tbody>
                    <?php while($row = $res->fetch_assoc()){?>
                        <tr>
                            <td><?= $row["Name"];  ?></td>
                            <td><?= $row["Position"];  ?></td>
                            <td><?= $row["Office"];  ?></td>
                            <td><?= $row["Age"];  ?></td>
                            <td><?= $row["Salary"]." $";  ?></td>
                            <td>
                                <a href="" class="btn btn-danger btn-circle btn-sm tableicons mx-3">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-circle btn-sm mx-3">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>