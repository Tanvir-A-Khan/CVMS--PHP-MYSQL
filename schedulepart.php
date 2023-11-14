<div class="managementpart">
    <div class="row">
        <div class="col-lg-6">
            <div class="takenvaccine">
                <h6>Taken Vaccine</h6>
                <div class="takenvaccinetable">
                    <form action="schedulemanagement.php" method="post">

                        <table>
                            <tr>
                                <th>SI No.</th>
                                <th> Vaccine Name</th>
                                <th> Dose </th>
                                <th> Date </th>
                                <th> Center Name</th>
                                <th>Certificate</th>
                            </tr>

                            <?php
                            echo $listoftakenvaccines;
                            ?>

                            <!-- <tr>
                            <td>1</td>
                            <td>Peter Parker</td>
                            <td>1st</td>
                            <td>50$</td>
                            <td>02-02-2022</td>
                            <td>KJP</td>
                            <td><button style="background: yellow;">Certificate</button></td>
                                </tr> -->

                        </table>
                    </form>
                </div>

            </div>
        </div>

        <div class="col-lg-6">
            <div class="upcomingvaccine">
                <h6>Up Coming Vaccine</h6>

                <div class="upcomingvaccinetable">
                    <form action="" method="POST">
                        <table>
                            <tr>
                                <th>SI No.</th>
                                <th> Vaccine Name</th>
                                <th> Dose </th>
                                <th> Price </th>
                                <th> Date </th>
                                <th> Center Name</th>
                                <th> Action </th>
                            </tr>
                            <!-- <tr>
                                        <td>1</td>
                                        <td>Peter Parker</td>
                                        <td>1st</td>
                                        <td>50$</td>
                                        <td>02-02-2022</td>
                                        <td>KJP</td>
                                        <td><button style="background: greenyellow;">Vaccinate</button></td>
                                    </tr> -->

                            <?php
                            echo $listofupcommingvaccines;
                            ?>

                        </table>
                    </form>
                </div>
            </div>
            <form action="" method="GET">
                <button type="SUBMIT" name="ADD">Add Schedule</button>

            </form>

        </div>

    </div>
</div>