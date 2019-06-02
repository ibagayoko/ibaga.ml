@extends('layouts.dashboard')

@push('headerRight')

@endpush
@php
    $links = $linksName =[];
@endphp
@section('content')
    <page-content>
            <grid-Row>
                    <grid-Col lg="4">
                 
                      <Card>
                        <card-Body>
                          <Media>
                            <Avatar
                              size="xxl"
                              class-Name="mr-5"
                              image-URL="{{ $data["user"]->avatar }}"
                            ></Avatar>
                            <Media-Body-Social
                              name="{{ $data["user"]->name }}"
                              work-Title="{{ '@'.$data['user']->username }}"
                              facebook="Facebook"
                              twitter="Twitter"
                              phone="1234567890"
                            ></Media-Body-Social>
                          </Media>
                        </card-Body>
                      </Card>
                    </grid-Col>
                    <grid-col lg="8">
                        <form  action="{{ route("user.update.info", $data['user']->username) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <card  titre="Edit Profile Username" options="true">
                            {{-- <card-Title >Edit Profile Username</card-Title> --}}
                            <Card-Alert color="success">
                                Adding action was successful
                            </Card-Alert>
                            <card-Body>
                              <grid-Row>
                                <grid-Col md="12">
                                  <Form-Group is-required="true" label="Username">
                                    <Form-Input-Group>
                                    <Form-Input-Group-Prepend>
                                    <Form-Input-Group-Text>@</Form-Input-Group-Text>
                                    </Form-Input-Group-Prepend>
                                      <Form-Input
                                        type="text"
                                        
                                        placeholder="{{ __("user.form.username") }}"
                                        name="name"
                                        value="{{ $data["user"]->username }}"
                                      ></Form-Input>
                                    </Form-Input-Group>
                                  </Form-Group>
                                </grid-Col>
                  
                              </grid-Row>
                            </card-Body>
                            <card-Footer class-name="text-right">
                              <i-Button type="submit" color="primary">
                                Update Profile
                              </i-Button>
                            </Card-Footer>
                            </card>
                          </form>
                        <form class="card" action="{{ route("user.update.password", $data['user']->username) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <card-Body>
                              <card-Title>Edit Profile Password</card-Title>
                              <grid-Row>
                                <grid-Col md="12">
                                  <Form-Group>
                                    <Form-Label>{{ __("user.form.label.current_password") }}</Form-Label>
                                    <Form-Input
                                      type="password"
                                      placeholder="{{ __("user.form.placeholder.current_password") }}"
                                      name="current_password"
                                      value=""
                                    />
                                  </Form-Group>
                                </grid-Col>

                                <grid-Col md="12">
                                    <Form-Group>
                                      <Form-Label>{{ __("user.form.label.new_password") }}</Form-Label>
                                      <Form-Input
                                        type="password"
                                        placeholder="{{ __("user.form.placeholder.new_password") }}"
                                        name="password"
                                        value=""
                                      />
                                    </Form-Group>
                                  </grid-Col>

                                  <grid-Col md="12">
                                      <Form-Group>
                                        <Form-Label>{{ __("user.form.label.password_confirmation") }}</Form-Label>
                                        <Form-Input
                                          type="password"
                                          placeholder="{{ __("user.form.placeholder.password_confirmation") }}"
                                          name="password_confirmation"
                                          value=""
                                        />
                                      </Form-Group>
                                    </grid-Col>
                                    <div class="text-center p-t-12">
                                        <span class="txt1">
                                            
                                        </span>
                                        <a class="txt2" href="{{ route('password.request') }}">
                                            Forgot Password?
                                        </a>
                                    </div>
                               
                              </grid-Row>
                            </card-Body>
                            <card-Footer class-name="text-right">
                              <i-Button type="submit" color="primary">
                                Update Password
                              </i-Button>
                            </Card-Footer>
                          </form>
                   
                        <form class="card" action="{{ route("user.update.info", $data['user']->username) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <card-Body>
                              <card-Title>Edit Profile Info</card-Title>
                              <grid-Row>
                                <grid-Col md="12">
                                  <Form-Group is-required="true" label="Name">
                                    <Form-Input
                                      type="text"
                                      
                                      placeholder="{{ __("user.form.name") }}"
                                      name="name"
                                      value="{{ $data["user"]->name }}"
                                    />
                                  </Form-Group>
                                </grid-Col>
                  
                                <grid-Col md="12">
                                  <Form-Group class-name="mb=0" label="About Me">
                                    <form-Textarea 
                                      name="bio"
                                      rows="5"
                                      placeholder="Here can be your description"
                                    >{{ $data["user"]->bio }}&nbsp;</form-Textarea>
                                  </Form-Group>

                                </grid-Col>
                              </grid-Row>
                            </card-Body>
                            <card-Footer class-name="text-right">
                              <i-Button type="submit" color="primary">
                                Update Profile
                              </i-Button>
                            </Card-Footer>
                          </form>
                    </grid-col>
            </grid-Row>
    </page-content>
@endsection