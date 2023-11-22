<x-app-layout>

    <x-slot name="body_container">
        <div class="page-wrapper">
            <div class="page-content">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addExpenseModal">Add Expense</button>
                <div class="row mt-5">
                    <div class="col-md-8">
                        <table id="expenses" class="display">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expenses as $expense)
                                <tr>
                                    <td> {{strtoupper($expense->name)}} </td>
                                    <td> {{$expense->expense_date}} </td>
                                    <td> {{$expense->amount}} </td>
                                    <td> 
                                        <div class="card-body">
                                            <div class="row row-cols-auto g-3">
                                                <div class="col">
                                                    <button type="button" class="btn btn-outline-primary"><i class="bx bx-pencil me-0"></i>
                                                    </button>
                                                </div>
                                                <div class="col">
                                                    <button type="button" class="btn btn-outline-danger"><i class="bx bx-trash me-0"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!--end row-->
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div id="chart12"></div>
                        </div>
                    </div>
                    </div>
                    
                </div>
                <div class="row mt-5">
                    <div class="col-md-8">
                        
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <h5 class="card-title">Special title treatment</h5>
                                </div>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> <a href="javascript:;" class="btn btn-success">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="modal" id="addExpenseModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <form action="{{ route('expense.store') }}" method="POST">
                @csrf
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Record Expense</h5>
                <button type="button" class="btn btn-default btn-sm close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Expense Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="" placeholder="Enter expense name">
                  </div>
                  <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Amount</label>
                    <input type="number" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter an amount">
                  </div>
                  <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Account</label>
                    <select class="form-control" name="account">
                            <option value="">Select Account</option>
                        @foreach(\App\Models\Account::get() as $k => $account)
                            <option value="{{$account->id}}">{{$account->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Category</label>
                    <select class="form-control" name="category">
                        <option value="">Select Account</option>
                        @foreach(\App\Models\Categories::where('type', 'expense')->get() as $k => $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" class="form-control" id="date" name="date">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            </form>
          </div>
        </div>

    </x-slot>

    <!--start page wrapper -->

    <!--end page wrapper -->

    <x-slot  name="javascript">
        <script src="assets/plugins/highcharts/js/highcharts.js"></script>
        <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
        <script type="text/javascript">


            let table = new DataTable('#expenses');
        </script>

        <script type="text/javascript">
            $(function () {
                "use strict";                 
                
                var options = {
                      series: [30],
                      chart: {
                          foreColor: '#9ba7b2',
                      height: 350,
                      type: 'radialBar',
                    },
                    plotOptions: {
                      radialBar: {
                        hollow: {
                          size: '60%',
                        }
                      },
                    },
                    labels: ['Nov Budget Usage'],
                    };

                    var chart = new ApexCharts(document.querySelector("#chart12"), options);
                    chart.render();
                    
                    
            });
        </script>
    </x-slot>

</x-app-layout>
