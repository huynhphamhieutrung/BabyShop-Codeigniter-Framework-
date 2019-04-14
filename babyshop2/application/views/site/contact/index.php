<html>

    <head>
        <?php $this->load->view('site/head');?>
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top " style="background-color: #ff66cc;">
            <?php $this->load->view('site/header')?>
        </nav>

        <div class="container">
	<div class="row">
      <div class="col-md-12 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal"  action="" method="post">
          <fieldset>
            <legend class="text-center">Liên hệ với chúng tôi</legend>
    
            <!-- Name input-->
            <div class="form-group" >
              <label class="col-md-3 control-label" for="name">Tên</label>
              <div class="col-md-9" >
                <input id="name" name="name" type="text" placeholder="Tên của bạn" class="form-control" >
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Email</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Email của bạn"  class="form-control">
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Lời nhắn</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Để lời nhắn của bạn ở đây..." rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg">Gửi</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>

            </div>
            <!-- /.row -->
        </div>

        

    </body>
    
</html>

