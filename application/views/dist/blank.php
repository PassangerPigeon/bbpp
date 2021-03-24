<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          
          <div class="section-header">
            <h1>Blank Page</h1>
          </div>

          <div class="section-body">
            
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                

                <div class="card">
                  <div class="card-header">
                    <h4>Inline Forms</h4>
                  </div>
                  <div class="card-body">
                    <form class="form-inline">
                      <label class="sr-only" for="inlineFormInputName2">Name</label>
                      <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">

                      <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                      <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
                      </div>
                    </form>
                  </div>
                </div>
               
              </div>
            </div>

             <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                

                <div class="card">
                  <div class="card-header">
                    <h4>Inline Forms</h4>
                  </div>
                  <div class="card-body">
                    <form class="form-inline">
                      <label class="sr-only" for="inlineFormInputName2">Name</label>
                      <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">

                      <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                      <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
                      </div>
                    </form>
                  </div>
                </div>
               
              </div>
            </div>


          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>