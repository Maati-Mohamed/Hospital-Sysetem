<?php include "init.php";?>
            <div class="book">
                <p>اهلا بك في مستشفى الشفاء.. للحجز املء الاستمارة ادناه</p> <?php 
                    if(Input::exists()){
                    $validate = new Validate();
                    $validation  = $validate->check($_POST,array(
                        'الاسم' => array(
                            'required'  => true,
                            'min'	    => 10,
                            'unique'    => 'pations'
                        ),
                        'البريد'   => array(
                            'required'  => true,
                        ),
                        'التاريخ'   => array(
                            'required'  => true,
                        )
                        ));
                        if($validation->passed()){
                            // Insert Information into database
                            $inser = DB::getInstance()->insert('pations',array(
                                'name' 		   => Input::get('الاسم'),
                                'email' 	       => Input::get('البريد'),
                                'date' 		   => Input::get('التاريخ')
                            
                            ));
                            echo "<p style='color:green'>"."تم الحجز بنجاح .."."</p>";
                        } else {
                            foreach($validation->error() as $error){
                                echo "<div class='center'>";
                                echo "<span>".$error."<br>"."</span>";
                                echo "</div>";
                            }
                        }
                    }?>
                <form action="" method="POST">
                    <input type="text" name="الاسم" placeholder="ادخل الاسم ">
                    <input type="text" name="البريد" placeholder="ادخل البريد الالكتروني">
                    <input type="date" name="التاريخ">
                    <input type="submit" value="احجز الان">
                </form>
            </div>
        </div>
    </body>
</html>