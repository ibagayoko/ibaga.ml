<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta -->
    @stack('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700,900" rel="stylesheet">

    <!-- HighlightJS scripts -->
    <script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.13.1/build/highlight.min.js"></script>

    <!-- HighlightJS sheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.13.1/build/styles/github.min.css">

    <!-- Bootstrap 4 sheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- Medium-Zoom scripts -->
    <script src="https://unpkg.com/medium-zoom@0/dist/medium-zoom.min.js"></script>

    <!-- Bootstrap 4 scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<link rel="stylesheet" href="http://tabler-react.com/static/css/main.7357ccf6.chunk.css">
    <!-- FontAwesome scripts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
        <!-- Scripts -->
        <script src="https://momentjs.com/downloads/moment.js"></script>
        <script src="{{ ('/app.js') }}" defer></script>
        
    <!-- Additional style sheets -->
    @stack('styles')
</head>
<body>
  @php
      $menu = [[
                  "value"=> "Forms",
                  "to"=> "/form-elements",
                  "icon"=> "check-square"
],
                [
                  "value"=> "Gallery",
                  "to"=> "/gallery",
                  "icon"=> "image",
                ]
      ];
      $links= ["https://malimoncton"];
    $linksName = ['<a>Halo'];
      $data = [
                                "columns"=> [
                                  // each columns data
                                  [
                                    "data1",
                                    0,
                                    5,
                                    1,
                                    2,
                                    7,
                                    5,
                                    6,
                                    8,
                                    24,
                                    7,
                                    12,
                                    5,
                                    6,
                                    3,
                                    2,
                                    2,
                                    6,
                                    30,
                                    10,
                                    10,
                                    15,
                                    14,
                                    47,
                                    65,
                                    55,
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
    <div id="app">
        <Site-Wrapper>
            <template v-slot:header>
                <Site-Header
                        href= "/"
                        alt="Tabler React"
                        image-url= "https://preview.tabler.io/demo/brand/tabler.svg">
                        <template slot="navItems">

                          <Nav-Item type="div" class-Name="d-none d-md-flex">
                            <i-Button
                              href="https://github.com/tabler/tabler-react"
                              target="_blank"
                              outline
                              size="sm"
                              RootComponent="a"
                              color="primary"
                            >
                              Source code
                            </i-Button>
                          </Nav-Item>
                        </template>

                        </Site-Header>

            </template>
            <template #nav >
                <Site-Nav :items="{{ json_encode($menu)}}" :collapse="this.collapseMobileMenu"/>
            </template>
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
                        />
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
                              {{-- :style="{height: '10rem'}" --}}
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
                                <Table-Col-Header colSpan="2">User</Table-Col-Header>
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
                                  <Avatar image-URL="https://preview.tabler.io/demo/faces/male/9.jpg" >pl</Avatar>
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
                      
                    </Grid-Row>
            </Page-Content>
            <template  v-slot:footer >

              <Site-Footer :links="{{ json_encode($links)}}" :links-name="{{ json_encode($linksName) }}" note="Premium and Open Source dashboard template with responsive and high quality UI. For Free!">
                <template slot="copyright">
                    Copyright © 2019
              <a href="."> Tabler-react</a>. Theme by
              <a
                href="https://codecalm.net"
                target="_blank"
                rel="noopener noreferrer"
              >
                @{{" "}}
                codecalm.net
              </a>@{{" "}}
              All rights reserved.
                </template>
                <template slot="nav">
nav
                  </template>
              </Site-Footer>
            </template>
                      <Site-Wrapper>


    </div>


    <!-- Additional scripts -->
    @stack('scripts')
</body>
</html>