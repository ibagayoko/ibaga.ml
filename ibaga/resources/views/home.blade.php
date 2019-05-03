@extends('layouts.dashboard')

@section('content')
  @php
    // dd($data);
      $menu = [
        [
          "value"=> "Forms",
          "to"=> "",
          "icon"=> "check-square",
          "subItems" => [
            [
              "value"=> "Forms",
              "to"=> route("home"),
              "icon"=> "check-square",
            ],
          ]
        ],
        [
          "value"=> "Gallery",
          "to"=> route("post.index"),
          "icon"=> "image",
        ],
      ];
      $links= ["https://malimoncton"];
    $linksName = ['<a>Halo'];


      $data1 = [
        "columns"=> [
          // each columns data
          [
            "data1",
            0,5,1,2,7,5,6,8,24,7,12,5,6,3,2,2,6,30,10,10,15,14,47,65,55,
          ],
        ],
        // "type"=> "area", // default type of chart
        "groups"=> [["data1", "data2", "data3"]],
        "colors"=> [
          "data1"=> "#467fcf",
        ],
        "names"=> [
          // name of each serie
          "data1"=> "Purchases",
        ],
      ];
      $axis = [
        "y"=>[
          "padding"=>[
            "bottom"=> 0,
          ],
          "show"=> false,
          "tick"=> [
            "outer"=> false,
          ],
        ],
        "x"=> [
          "padding"=> [
            "left"=> 0,
            "right"=> 0,
          ],
          "show"=>false,
        ],
      ];
      $point = [
        "show"=> false,
      ];
      $legend = [
        "position"=> "inset",
        "padding"=> 0,
        "inset"=> [
          "anchor"=> "top-left",
          "x"=> 20,
          "y"=> 8,
          "step"=> 10,
        ],
      ];
  @endphp
    
            
            
            <Page-Content title="Dashboard" >
                    <Grid-Row :cards="true">
                      @foreach ($data['posts']['count'] as $key => $item)
                          
                      <Grid-Col width="6" sm="4" lg="2">
                        <Progress-Card
                        progress-Color="green"
                        :progress-Width=@if($data['posts']['count']){{ intval(100*$item/intval($data['posts']['count'])) }} @else{{ 0 }} @endif
                        >
                          <h5 class="h5" SLOT="header">Posts {{ $key }}</h5>
                          {{ $item }}
                        </Progress-Card>
                      </Grid-Col>

                      @endforeach
                      <Grid-Col width="6" sm="4" lg="2">
                        <Progress-Card
                          header="Tags"
                          progress-Color="red"
                          :progress-Width="100"
                          >
                          <h5 class="h5" SLOT="header">Tags</h5>
                          {{ $data['tags']['count'] }}
                        </Progress-Card>
                      </Grid-Col>
                        
                    </Grid-Row>
                    <Grid-row>
                     
                      <Grid-Col md="6">
                        
                        <Grid-Row>
                          
                  <Grid-Col :sm=6>
                    <Progress-Card
                     
                      content="$652"
                      progress-Color="green"
                      :progress-Width=84
                    >
                    <h5 slot=header> Today profit</h5>
                  </Progress-Card>

                  </Grid-Col>
              </Grid-Row>
                    </Grid-col>
                    <Grid-Col sm=6 lg=3>
                        <Stamp-Card
                          color="blue"
                          icon="dollar-sign"
                         
                          
                        >
                        <Fragment slot=footer>
                            12 waiting payments
                        </Fragment>
                          <a href="#" slot=header>
                            132 <small>Sales</small>
                          </a>
                        
                      </Stamp-Card>
                      </Grid-Col>
                      <Grid-Col sm=6 lg=3>
                        <Stamp-Card
                          color="green"
                          icon="shopping-cart"
                       >
                       
                        <a href="#" slot=header>
                          78 <small>Orders</small>
                        </a>
                      
                      <fragment slot=footer>
                        32 shipped
                      </fragment>
                      haha content ggchgh 
                      ggjh<br/>
                      </Stamp-Card>
                      </Grid-Col>
                    </Grid-Row>
                      <Grid-Row :cards="true" :deck="true">
                          <Grid-Col width=12>
                            <Card>
                              <I-Table
                                :responsive="true"
                                :highlight-Row-On-Hover="true"
                                has-Outline
                                vertical-Align="center"
                                :cards="true"
                                class-Name="text-nowrap"
                              >
                                <Table-Header>
                                  <Table-Row>
                                    <Table-Col-Header align-Content="center" class-Name="w-1">
                                      <i class="icon-people" ></i>
                                    </Table-Col-Header>
                                    <Table-Col-Header>User</Table-Col-Header>
                                    <Table-Col-Header>Usage</Table-Col-Header>
                                    <Table-Col-Header align-Content="center">
                                      Payment
                                    </Table-Col-Header>
                                    <Table-Col-Header>Activity</Table-Col-Header>
                                    <Table-Col-Header align-Content="center">
                                      Satisfaction
                                    </Table-Col-Header>
                                    <Table-Col-Header align-Content="center">
                                      <i class="icon-settings"></i>
                                    </Table-Col-Header>
                                  </Table-Row>
                                </Table-Header>
                                <Table-Body>
                                  <Table-Row>
                                    <Table-Col align-Content="center">
                                      <Avatar
                                        image-URL="https://preview.tabler.io/demo/faces/female/26.jpg"
                                        class-Name="d-block"
                                        status="green"
                                      />
                                    </Table-Col>
                                    <Table-Col>
                                      <div>Elizabeth Martin</div>
                                      <I-Text size="sm" :muted="true">
                                        Registered: Mar 19, 2018
                                      </I-Text>
                                    </Table-Col>
                                    <Table-Col>
                                      <div class="clearfix">
                                        <div class="float-left">
                                          <strong>42%</strong>
                                        </div>
                                        <div class="float-right">
                                          <I-Text-Small :muted="true">
                                            Jun 11, 2015 - Jul 10, 2015
                                          </I-Text-Small>
                                        </div>
                                      </div>
                                      <I-Progress size="xs">
                                        <Progress-Bar color="yellow" :width=42 />
                                      </I-Progress>
                                    </Table-Col>
                                    <Table-Col align-Content="center">
                                      <Icon :payment=true name="visa" />
                                    </Table-Col>
                                    <Table-Col>
                                      <I-Text size="sm" :muted="true">
                                        Last login
                                      </I-Text>
                                      <div>4 minutes ago</div>
                                    </Table-Col>
                                    <Table-Col align-Content="center">42%</Table-Col>
                                    <Table-Col align-Content="center">
                                      
                                    </Table-Col>
                                  </Table-Row>
                                </Table-Body>
                              </Table>
                            </Card>
                          </Grid-Col>
                        </Grid-Row>
                    
                    
                    
            </Page-Content>
            
         
            
            
            <!-- Additional scripts -->
            <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    
@endsection