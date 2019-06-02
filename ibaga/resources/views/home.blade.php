@extends('layouts.dashboard')

@section('content')
  @php
    // dd(Route::all());
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


  
  @endphp
    @section('title', 'Dashboard')
            
            
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
                    
            </Page-Content>
            
         
            
            
    
@endsection

@push('scripts')
         <!-- Additional scripts -->
         <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
@endpush