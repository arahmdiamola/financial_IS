<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->
    <?php
        $users = \App\Models\User::where('organization', Auth::user()->organization)->pluck('id');
        $base_income = \App\Models\income::where('organization', Auth::user()->organization);
        $income = $base_income->sum('amount');
        $base_expenses = \App\Models\expense::where('user', $users->toArray());
        $expenses = $base_expenses->sum('amount');
        $savings = $income - $expenses;
    ?>
    <x-slot name="body_container">
        <div class="page-wrapper">
            <div class="page-content">
                <div class="row ">
                    <div class="col-md-2 offset-md-11">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"><i class="bx bx-wrench"></i>Adjust</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-8">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div id="chart-container"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                        <div class="card-header">
                            <h4>Budget Status</h4>
                        </div>
                        <div class="card-body">
                            <div class="transaction-progress">
                                <div class="item mt-5">
                                    <strong class="pull-right" style="float:right;">{{$base_expenses->count()}} Transactions</strong>
                                    <p class="text-muted"> <i class="mdi mdi-checkbox-blank-circle-outline text-info"></i> Expenses</p>
                                    <div class="progress progress-bar-primary-alt">
                                        <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width:67%">
                                        </div>
                                    </div>
                                </div>
                                <div class="item mt-3">
                                    <strong class="pull-right"  style="float:right;">{{$base_income->count()}} Transactions</strong>
                                    <p class="text-muted"> <i class="mdi mdi-checkbox-blank-circle-outline text-primary"></i> Income</p>
                                    <div class="progress progress-bar-success-alt">
                                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width:33%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <div class="row transaction-links">
                                        <p class="text-center view-all-transaction">View all transaction records</p>
                                    <div class="col-md-3 offset-md-3">
                                        <a href="/expense/" class="form-control btn btn-danger" type="button">Expenses</a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="/income/" class="form-control btn btn-primary" type="button">Income</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-striped">
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>Mark <br><span class="text-muted">November 13, 2023</span></td>
                              <td>Otto</td>
                              <td>@mdo</td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                              <td>Jacob</td>
                              <td>Thornton</td>
                              <td>@fat</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-success border-bottom border-3 border-0">
                            <div class="card-body">
                                <div class="jumbotron">

                                  <h3 class="display-5">Budget Status</h3>
                                  <h4 class="text-center mt-5 mb-4">Looking Good {{ Auth::user()->name }}!</h4>
                                  <p class="lead">You have spent P{{ $expenses }} which is one percent more than your expected monthly budget you have nothing left to spend.</p>
                                  <hr class="my-4">
                                  
                                  <p class="lead">
                                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                                  </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Large modal -->
        <div class="modal fade bd-example-modal-lg" id="adjusmentModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header gap-5">
              <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- <div class="modal-body">
                  <div class="form-group">
                    <label for="spend_per_month">I want to spend (Monthly)</label>
                    <span class="contenteditable"></span>
                    <input type="number" class="form-control" id="spend_per_month" name="spend_per_month" value="">
                    <small class="form-text text-muted">Per Month</small>
                  </div>
                  <div class="form-group">
                    <label for="save_per_month">I want to save (Monthly)</label>
                    <input type="number" class="form-control" id="save_per_month" name="save_per_month" placeholder="">
                    <small class="form-text text-muted">Per Month</small>
                  </div>
                  <br>
                  <button type="button" class="btn btn-primary"onclick="openAllocationModal()"><i class="bx bx-wrench"></i>Distribute</button>
                  <button type="button" class="btn btn-warning"  data-bs-dismiss="modal">cancel</button>
            </div> -->
            <div class="modal-body">
              <!--start stepper one--> 
                <div id="stepper1" class="bs-stepper">
                  <div class="card">

                    
                    <div class="card-header">
                        <div class="d-lg-flex flex-lg-row align-items-lg-center justify-content-lg-between" role="tablist">
                            <div class="step" data-target="#test-l-1">
                              <div class="step-trigger" role="tab" id="stepper1trigger1" aria-controls="test-l-1">
                                <div class="bs-stepper-circle">1</div>
                                <div class="">
                                    <h5 class="mb-0 steper-title">Budget Information</h5>
                                    <p class="mb-0 steper-sub-title">Enter Your Details</p>
                                </div>
                              </div>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#test-l-2">
                                <div class="step-trigger" role="tab" id="stepper1trigger2" aria-controls="test-l-2">
                                  <div class="bs-stepper-circle">2</div>
                                  <div class="">
                                      <h5 class="mb-0 steper-title">Distribution</h5>
                                      <p class="mb-0 steper-sub-title">Distribute your expenses within your budget!</p>
                                  </div>
                                </div>
                              </div>
                          </div>
                    </div>
                    <div class="card-body">
                    
                      <div class="bs-stepper-content">
                        <form onSubmit="return false">
                          <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
                            <h5 class="mb-1">Budget Information</h5>
                            <p class="mb-4">Create a budget of how much you want to spend, save and earning goals. Also distribute your budget.</p>

                            <div class="row g-3">
                                <div class="col-12 col-lg-6">
                                    <label for="spend_monthly" class="form-label">I want to spend (Monthly)</label>
                                    <input type="number" class="form-control" id="spend_monthly" placeholder="1000">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label for="save_monthly" class="form-label">I want to save (Monthly)</label>
                                    <input type="number" class="form-control" id="save_monthly" placeholder="1000">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <button class="btn btn-primary px-4" onclick="stepper1.next()">Next<i class='bx bx-right-arrow-alt ms-2'></i></button>
                                </div>
                            </div><!---end row-->
                            
                          </div>

                          <div id="test-l-2" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger2">

                            <h5 class="mb-1">Distribution</h5>
                            <p class="mb-4">Create a budget of how much you want to spend, save and earning goals. Also distribute your budget.</p>

                            <div class="row g-3">
                                @foreach(\App\Models\Categories::where('type', 'expense')->get() as $k => $cat)
                                <div class="col-12 col-lg-12">
                                    <label for="spend_monthly" class="form-label">{{ucfirst($cat->name)}}</label><label style="float:right"><span id="range-{{$k}}">0</span>/<span class="spend_monthly">{{Auth::user()->getOrg->spend_monthly}}</span></label>
                                    <input type="range" class="form-range" value="0" min="0" max="{{Auth::user()->getOrg->spend_monthly}}" id="customRange2" step="10" oninput="sliderChange(this.value, {{$k}})">
                                </div>
                                @endforeach
                                <div class="col-12">
                                    <div class="d-flex align-items-center gap-3">
                                        <button class="btn btn-primary px-4" onclick="stepper1.previous()"><i class='bx bx-left-arrow-alt me-2'></i>Previous</button>
                                        <button class="btn btn-success px-4" onclick="stepper1.next()">Submit</button>
                                    </div>
                                </div>
                            </div><!---end row-->
                          </div>
                        </form>
                      </div>
                       
                    </div>
                   </div>
                 </div>
                <!--end stepper one--> 
            </div>
          </div>
        </div>

    </x-slot>

    <x-slot  name="javascript">
        <!-- <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/plugins/simplebar/js/simplebar.min.js"></script>
        <script src="/assets/plugins/metismenu/js/metisMenu.min.js"></script>
        <script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script> -->
        <script src="/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
        <script src="/assets/plugins/bs-stepper/js/main.js"></script>

        <!-- <script src="/assets/echarts.min.js"></script> -->
        <script src="https://fastly.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
        <!-- <script src="assets/js/index2.js"></script> -->

        <script src="/assets/js/app.js"></script>
        <script type="text/javascript">
            //open allocation modal when distribute button click
           function openAllocationModal(){
                $("#adjustmentModal").modal("hide");
                $("#allocationModal").modal("show");
            }
            //save budget allocation for each category
            function saveAllocation(){
                $("#allocationModal").modal("hide");
            }

            $(document).ready(function(){
                $('#spend_monthly').on('change', function(){
                    $(document).find('.spend_monthly').text(this.value);
                    $(document).find('.form-range').attr('max', this.value);
                });
            });

            function sliderChange(val, range) {
                $(document).find('#range-'+ range).html(val);
            }

        </script>



        <script type="text/javascript">

            var dom = document.getElementById('chart-container');
            var myChart = echarts.init(dom, null, {
              renderer: 'canvas',
              useDirtyRect: false
            });
            var app = {};

            var option;

            const data = {!! ($categories) !!};
            const expense = {!! ($cat_expense_value) !!};

            option = {
              title: [
                {
                  text: 'Budgeting Chart',
                  left: 'center'
                },
                {
                  subtext: 'Budget',
                  left: '35%',
                  top: '85%',
                  textAlign: 'center'
                },
                {
                  subtext: 'Expense',
                  left: '65%',
                  top: '85%',
                  textAlign: 'center'
                }
              ],
              series: [
                {
                  type: 'pie',
                  radius: '50%',
                  center: ['50%', '50%'],
                  data: data,
                  label: {
                    position: 'outer',
                    alignTo: 'labelLine',
                    bleedMargin: 5
                  },
                  left: '5%',
                  right: '33.3333%',
                  top: 0,
                  bottom: 0
                },
                {
                  type: 'pie',
                  radius: '50%',
                  center: ['50%', '50%'],
                  data: expense,
                  label: {
                    position: 'outer',
                    alignTo: 'labelLine',
                    margin: 10
                  },
                  left: '33.3333%',
                  right: 0,
                  top: 0,
                  bottom: 0
                }
              ]
            };

            if (option && typeof option === 'object') {
              myChart.setOption(option);
            }

            window.addEventListener('resize', myChart.resize);
        </script>
    </x-slot>

</x-app-layout>
