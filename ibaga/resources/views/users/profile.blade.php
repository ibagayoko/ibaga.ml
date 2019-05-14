@extends('layouts.dashboard')

@push('navRight')

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
                        <form class="card">
                            <card-Body>
                              <card-Title>Edit Profile</card-Title>
                              <grid-Row>
                                <grid-Col md="5">
                                  <Form-Group>
                                    <Form-Label>Company</Form-Label>
                                    <Form-Input
                                      type="text"
                                      disabled
                                      placeholder="Company"
                                      value="Creative Code Inc."
                                    />
                                  </Form-Group>
                                </grid-Col>
                                <grid-Col sm="6" md="3">
                                  <Form-Group>
                                    <Form-Label>Username</Form-Label>
                                    <Form-Input
                                      type="text"
                                      placeholder="Username"
                                      value="michael23"
                                    />
                                  </Form-Group>
                                </grid-Col>
                                <grid-Col sm="6" md="4">
                                  <Form-Group>
                                    <Form-Label>Email address</Form-Label>
                                    <Form-Input type="email" placeholder="Email" />
                                  </Form-Group>
                                </grid-Col>
                                <grid-Col sm="6" md="6">
                                  <Form-Group>
                                    <Form-Label>First Name</Form-Label>
                                    <Form-Input
                                      type="text"
                                      placeholder="First Name"
                                      value="Chet"
                                    />
                                  </Form-Group>
                                </grid-Col>
                                <grid-Col sm="6" md="6">
                                  <Form-Group>
                                    <Form-Label>Last Name</Form-Label>
                                    <Form-Input
                                      type="text"
                                      placeholder="Last Name"
                                      value="Faker"
                                    />
                                  </Form-Group>
                                </grid-Col>
                                <grid-Col md="12">
                                  <Form-Group>
                                    <Form-Label>Address</Form-Label>
                                    <Form-Input
                                      type="text"
                                      placeholder="Home Address"
                                      value="Melbourne, Australia"
                                    />
                                  </Form-Group>
                                </grid-Col>
                                <grid-Col sm="6" md="4">
                                  <Form-Group>
                                    <Form-Label>City</Form-Label>
                                    <Form-Input
                                      type="text"
                                      placeholder="City"
                                      value="Melbourne"
                                    />
                                  </Form-Group>
                                </grid-Col>
                                <grid-Col sm="6" md="3">
                                  <Form-Group>
                                    <Form-Label>Postal Code</Form-Label>
                                    <Form-Input type="number" placeholder="ZIP Code" />
                                  </Form-Group>
                                </grid-Col>
                                <grid-Col md="5">
                                  <Form-Group>
                                    <Form-Label>Country</Form-Label>
                                    <form-select>
                                      <option>Germany</option>
                                    </form-select>
                                  </Form-Group>
                                </grid-Col>
                                <grid-Col md="12">
                                  <Form-Group class-name="mb=0" label="About Me">
                                    <form-Textarea 
                                      rows="5"
                                      placeholder="Here can be your description"
                                    > Oh so, your weak rhyme You doubt I'll bother, reading
                                      into it I'll probably won't, left to my own devices
                                      But that's the difference in our opinions.
                                    </form-Textarea>
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