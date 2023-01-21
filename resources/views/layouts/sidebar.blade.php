                   <div class="col-md-3">
                            <ul class="list-group">
                                <!-- admin part -->
                                @if(auth()->user()->role=='admin')
                                <li class="list-group-item">
                                   <a href="{{route('vmm.index')}}"> Vmm Lists </a>
                                </li>

                                <li class="list-group-item">
                                   <a href="{{route('vmm.create')}}"> Vmm Create </a>
                                </li>

                                @else 
                                <!-- user part -->
                                <li class="list-group-item"><a href="{{route('invest_history')}}">Invest History</a></li>
                                <li class="list-group-item">Wining History</li>
                                @endif 
                            </ul>
                            <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <button type="submit" class="btn btn-default">Logout</button>
                           </form>
                        </div>