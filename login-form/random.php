<div class="right__container">
    <h1 class="user__name"><?php
                            echo returnData('firstName');
                            ?> <?php
                                echo returnData('lastName');
                                ?></h1>


</div>

<!-- Image -->
<div class="profile__container">
    <img class="profile__pic" src="<?php
                                    echo returnData('profile');
                                    ?>" alt="">
</div>

<div class="dob">
    <span class="dob__title">Date of Birth</span> <span class="date"><?php
                                                                        echo returnData('DOB') ?></span>
</div>

<div class="education__container">
    <h2 class="education__title">Education</h2>
    <p class="major">
        <?php
        echo returnData('major') ?>
    </p>
    <p class="institution">
        <?php
        echo returnData('institution') ?>
    </p>
    <p class="startDate">
        <?php
        echo returnData('startDate') ?>
    </p>
    <p class="endDate">
        <?php
        echo returnData('endDate') ?>
    </p>

</div>