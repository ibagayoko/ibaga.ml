@extends('layouts.dashboard')

@section('content')
  @php
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
      $data = [
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
                      <Grid-Col width="6" sm="4" lg="2">
                        <Stats-Card :layout="1" :movement="6" total="43" label="New Tickets" />
                      </Grid-Col>
                      <Grid-Col width="6" sm="4" lg="2">
                        <Stats-Card
                          layout="1"
                          :movement="-3"
                          total="17"
                          label="Closed Today"
                        ></Stats-Card>
                      </Grid-Col>
                      <Grid-Col width="6" sm="4" lg="2">
                        <Stats-Card :layout="1" :movement="3" total="7" label="New Replies" />
                      </Grid-Col>
                      <Grid-Col width="6" sm="4" lg="2">
                          <Stats-Card :layout="1" :movement="3" total="7" label="New Replies" />
                        </Grid-Col>
                      <Grid-Col width="6" sm="4" lg="2">
                      </Grid-Col>
                      <Grid-Col lg="6">
                          <Card>
                            <template>
                            <Card-Header>
                              <Card-Title>Development Activity</Card-Title>
                            </Card-Header>
                            <C3-Chart
                              {{-- :cstyle="{height: '10rem'}" --}}
                              type="area"
                              :data="{{ json_encode($data) }}"
                              :axis="{{ json_encode($axis) }}"
                              :legend="{{ json_encode($legend) }}"
                              :tooltip="{
                                format: {
                                  title: function(x) {
                                    return '';
                                  },
                                },
                              }"
                              :padding="{
                                bottom: 0,
                                left: -1,
                                right: -1,
                              }"
                              :point="{{ json_encode($point) }}"
                            ></C3-Chart>
                            <I-Table
                            :cards="true"
                            :striped="true"
                            :responsive="true"
                            class-Name="table-vcenter"
                          >
                            <Table-Header>
                              <Table-Row>
                                <Table-Col-Header col-Span="2">User</Table-Col-Header>
                                <Table-Col-Header>Commit</Table-Col-Header>
                                <Table-Col-Header>Date</Table-Col-Header>
                                <Table-Col-Header />
                              </Table-Row>
                            </Table-Header>
                            <Table-Body>
                              <Table-Row>
                                <Table-Col class-Name="w-1">
                                  <Avatar image-URL="./demo/faces/male/9.jpg" />
                                </Table-Col>
                                <Table-Col>Ronald Bradley</Table-Col>
                                <Table-Col>Initial commit</Table-Col>
                                <Table-Col class-Name="text-nowrap">May 6, 2018</Table-Col>
                                <Table-Col class-Name="w-1">
                                  <Icon :link="true" name="trash" />
                                </Table-Col>
                              </Table-Row>
                              <Table-Row>
                                <Table-Col>
                                  <Avatar>BM</Avatar>
                                </Table-Col>
                                <Table-Col>Russell Gibson</Table-Col>
                                <Table-Col>Main structure</Table-Col>
                                <Table-Col class-Name="text-nowrap">
                                  April 22, 2018
                                </Table-Col>
                                <Table-Col>
                                  <Icon :link="true" name="trash" />
                                </Table-Col>
                              </Table-Row>
                              <Table-Row>
                                <Table-Col>
                                  <Avatar image-URL="https://preview.tabler.io/demo/faces/male/9.jpg" ></Avatar>
                                </Table-Col>
                                <Table-Col>Beverly Armstrong</Table-Col>
                                <Table-Col>Left sidebar adjustments</Table-Col>
                                <Table-Col class-Name="text-nowrap">
                                  April 15, 2018
                                </Table-Col>
                                <Table-Col>
                                  <Icon :link="true" name="trash" />
                                </Table-Col>
                              </Table-Row>
                              <Table-Row>
                                <Table-Col>
                                  <Avatar image-URL="./demo/faces/male/4.jpg" />
                                </Table-Col>
                                <Table-Col>Bobby Knight</Table-Col>
                                <Table-Col>Topbar dropdown style</Table-Col>
                                <Table-Col class-Name="text-nowrap">April 8, 2018</Table-Col>
                                <Table-Col>
                                  <Icon :link="true" name="trash" />
                                </Table-Col>
                              </Table-Row>
                              <Table-Row>
                                <Table-Col>
                                  <Avatar image-URL="./demo/faces/female/11.jpg" />
                                </Table-Col>
                                <Table-Col>Sharon Wells</Table-Col>
                                <Table-Col>Fixes #625</Table-Col>
                                <Table-Col class-Name="text-nowrap">April 9, 2018</Table-Col>
                                <Table-Col>
                                  <Icon :link="true" name="trash" />
                                </Table-Col>
                              </Table-Row>
                            </Table-Body>
                          </I-Table>
                        </template>
                          </Card>

                      </Grid-Col>
                      <Grid-Col md="6">
                        <Alert type="primary">
                             <template>

                               ksdhckb k
                               <Alert-Link
                               href="/documentation"
                               >
                               Read our documentation
                              </Alert-Link>
                              with code samples.
                            </template>
                        </Alert>
                        <Grid-Row>
                          <Grid-Col sm="6">
                            <Card>
                              <Card-Header>
                                <Card-Title>Chart title</Card-Title>
                              </Card-Header>
                              <Card-Body>
                                <C3-Chart
                                {{-- :style='{ height: "12rem" }' --}}
                                type="donut"
                                :data='{
                                  columns: [
                                    // each columns data
                                    ["data1", 63],
                                    ["data2", 37],
                                  ],
                                  type: "donut", // default type of chart
                                  colors: {
                                    data1: "#3866a6",//colors["green"],
                                    data2: "#3788c2"//colors["green-light"],
                                  },
                                  names: {
                                    // name of each serie
                                    data1: "Maximum",
                                    data2: "Minimum",
                                  },
                                }'
                                :legend='{
                                  show: false, //hide legend
                                }'
                                :padding='{
                                  bottom: 0,
                                  top: 0,
                                }'
                              />
                    </Card-Body>
                  </Card>
                </Grid-Col>

                <Grid-Col sm="6">
                    <Progress-Card
                      header="New feedback"
                      progress-Color="red"
                      :progress-Width=28
                    >
                    <h5 SLOT=header>New fEED</h5>
                    62
                  </Progress-Card>
                  </Grid-Col>
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
                        <Grid-Row>
                          <Grid-Col sm=6 lg=4>
                            <Card title="Browser Stats">
                              <I-Table class-Name="card-table">
                                <Table-Row>
                                  <Table-Col>
                                    <Icon prefix="fa" name="chrome" class-Name="text-muted" />
                                  </Table-Col>
                                  <Table-Col>Google Chrome</Table-Col>
                                  <Table-Col class-Name="text-right">
                                    <Text RootComponent="span" muted>
                                      23%
                                    </Text>
                                  </Table-Col>
                                </Table-Row>
                              </I-Table>
                            </Card>
                          </Grid-Col>
                          <Grid-Col sm=6 lg=4>
                            <Card title="Projects">
                              <I-Table :cards=true>
                                <Table-Row>
                                  <Table-Col>Admin Template</Table-Col>
                                  <Table-Col align-content="right">
                                    <Badge color="default">65%</Badge>
                                  </Table-Col>
                                </Table-Row>
                              </I-Table>
                            </Card>
                          </Grid-Col>
                          <Grid-Col md=6 lg=4>
                              <Card title="Members">
                                <Card-Body>
                                  <ul class="list-unstyled list-separated">
                                    <li class="list-separated-item">
                                      <Grid-Row class-Name="align-items-center">
                                        <Grid-Col :auto=true>
                                          <Avatar
                                            size="md"
                                            class-Name="d-block"
                                            image-URL="demo/faces/female/12.jpg"
                                          />
                                        </Grid-Col>
                                        <Grid-Col>
                                          <div>
                                            <a className="text-inherit" href="#">
                                              Amanda Hunt
                                            </a>
                                          </div>
                                          <I-Text-Small :muted=true class-Name="d-block item-except h-1x">
                                            amanda_hunt@example.com
                                          </I-Text-Small>
                                        </Grid-Col>
                                        <Grid-Col :auto=true>
                                          <Dropdown class-name="dropleft" flex="md" :content-Style='{right:"50%"}'>
                                            <template slot=trigger
                                                {{-- icon="more-vertical" --}}
                                                {{-- :toggle=false --}}
                                              >
                                              
                                              <Icon :link=true name="more-vertical" />
                                            </template>
                                            
                                              <div slot=content class=" dropdown-menu dropdown-menu-right dropdown-menu-arrow show " data-placement="right">
                                                <Dropdown-Item icon="tag">Action </Dropdown-Item>
                                                <Dropdown-Item icon="edit-2">
                                                  @{{" "}}
                                                  Another action@{{" "}}
                                                </Dropdown-Item>
                                                <Dropdown-Item-Divider />
                                                <Dropdown-Item icon="link">
                                                  {{" "}}
                                                  Separated link
                                                </Dropdown-Item>
                                              </div>
                                            
                                          </Dropdown>
                                        </Grid-Col>
                                      </Grid-Row>
                                    </li>
                                  </ul>
                                </Card-Body>
                              </Card>
                            </Grid-Col>
                            <Grid-Col md=6 lg=12>
                                <Grid-Row>
                                  <Grid-Col sm=6 lg=3>
                                    <Stats-Card
                                      layout=2
                                      :movement=5
                                      total="423"
                                      label="Users online" :chart=true>
                                      
                                      
                                        <C3-Chart
                                          :size='{height:"64"}'
                                          {{-- :cstyle='{ height: "100" }' --}}
                                          :padding='{
                                            bottom: -10,
                                            left: -1,
                                            right: -1,
                                          }'
                                          :data='{
                                            names: {
                                              data1: "Users online",
                                            },
                                            columns: [["data1", 30, 40, 10, 40, 12, 22, 40]],
                                          }'
                                          type= "area"
                                          :legend='{
                                            show: false,
                                          }'
                                          :transition='{
                                            duration: 0,
                                          }'
                                          :point='{
                                            show: false,
                                          }'
                                          :tooltip='{
                                            format: {
                                              title: function(x) {
                                                return "";
                                              },
                                            },
                                          }'
                                          :axis='{
                                            y: {
                                              padding: {
                                                bottom: 0,
                                              },
                                              show: false,
                                              tick: {
                                                outer: false,
                                              },
                                            },
                                            x: {
                                              padding: {
                                                left: 0,
                                                right: 0,
                                              },
                                              show: false,
                                            },
                                          }'
                                          :color='{
                                            pattern: ["#467fcf"],
                                          }'
                                        />
                                    </Stats-Card>
                                  </Grid-Col>
                                  <Grid-Col width=12>
                                      <Card title="Invoices">
                                        <i-Table tid="example"
                                          :responsive=true
                                          class-Name="card-table table-vcenter text-nowrap"
                                          
                                         
                                        >
                                            <Table-Header slot=header>
                                                <Table-Row>
                                                  <Table-Col-Header class-name="w-1">
                                                  No.
                                                  </Table-Col-Header>
                                                  <Table-Col-Header >
                                                  Invoice Subject
                                                </Table-Col-Header>
                                                <Table-Col-Header >
                                                  Client
                                                </Table-Col-Header>
                                                <Table-Col-Header >
                                                  VAT No
                                                </Table-Col-Header>
                                                  <Table-Col-Header>
                                                    Created
                                                  </Table-Col-Header>
                                                      <Table-Col-Header>
                                                        Status.
                                                      </Table-Col-Header>
                                                      <Table-Col-Header>
                                                            Price
                                                      </Table-Col-Header>
                                                      <Table-Col-Header>
                                                      </Table-Col-Header>
                                                      <Table-Col-Header>
                                                      </Table-Col-Header>

                                                </Table-Row>
                                            </Table-Header>
                                            <Table-Body>
                                            <Table-Row>
                                                      <Table-col>
                                                      <I-Text root-Tag="span" :muted=true>
                                                        001401
                                                      </I-Text>
                                                    </Table-col>
                                                    <Table-col>
                                                      <a href="invoice.html" className="text-inherit">
                                                        Design Works
                                                      </a>
                                                    </Table-col>
                                                    <Table-col>
                                                      Carlson Limited
                                                    </Table-col>
                                                    <Table-col>
                                                      87956621
                                                    </Table-col>
                                                    <Table-col>
                                                      15 Dec 2017
                                                    </Table-col>
                                                         <Table-col>
                                                           <span className="status-icon bg-success"></span> Paid
                                                          </Table-col>
                                                        <Table-col>
                                                          $887
                                                        </Table-col>
                                                        <Table-col  align-Content="right">
                                                              <i-Button size="sm" color="secondary">
                                                                Manage
                                                              </i-Button>
                                                              <div class="dropdown">
                                                                <i-Button
                                                                color="secondary"
                                                                size="sm"
                                                                is-Dropdown-Toggle
                                                                >
                                                                Actions
                                                              </i-Button>
                                                            </div>
                                                          </Table-col>
                                                      <Table-col>
                                                         <Icon link name="edit" /> 
                                                      </Table-col>
                                            </Table-Row>
                                            @include('tr')
                                            </Table-Body>
                                          </i-Table>
                                      </Card>
                                    </Grid-Col>
                                  {{-- </Grid-Row> --}}
                    </Grid-Row>
                    
                    
            </Page-Content>
            
         
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.css"/> --}}
 
{{-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.js"></script> --}}


    <!-- Additional scripts -->
    
@endsection