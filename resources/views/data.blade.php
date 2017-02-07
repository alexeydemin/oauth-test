<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div>
            <div class="content">
              <table border="1">
                  <tr><td>Name</td><td>{{ $data['name'] }} </td></tr>
                  <tr><td>Birthday</td><td>{{ $data['birthday'] }} </td></tr>
                  <tr><td># of friends</td><td>{{ $data['context']['mutual_friends']['summary']['total_count'] }} </td></tr>
                  <tr><td>Liked Pages</td>
                      <td>
                          @forelse ($data['context']['mutual_likes']['data'] as $item)
                              <li><a href="https://fb.com/{{ $item['id'] }}">{{ $item['name'] }}</a></li>
                          @empty
                              <p>No items</p>
                          @endforelse
                      </td>
                  </tr>
                  <tr><td>Devices</td>
                      <td>
                          @forelse ($data['devices'] as $item)
                              <li>{{ $item['os'] }}</li>
                          @empty
                              <p>No items</p>
                          @endforelse
                      </td>
                  </tr>
                  <tr><td>Education</td>
                      <td>
                          @forelse ($data['education'] as $item)
                              <li>{{ $item['school']['name'] }} {{ $item['year']['name'] }}</li>
                          @empty
                              <p>No items</p>
                          @endforelse
                      </td>
                  </tr>
                  <tr><td>Email</td><td>{{ $data['email'] }} </td></tr>
                  <tr><td>Gender</td><td>{{ $data['gender'] }} </td></tr>
                  <tr><td>Hometown</td><td>{{ $data['hometown']['name'] }} </td></tr>
                  <tr><td>Languages</td>
                      <td>
                          @forelse ($data['languages'] as $item)
                              <li>{{ $item['name'] }}</li>
                          @empty
                              <p>No items</p>
                          @endforelse
                      </td>
                  </tr>
                  <tr><td>Location</td><td>{{ $data['location']['name'] }} </td></tr>
                  <tr><td>Cover photo</td><td><img src="{{ $data['cover']['source'] }}"></td></tr>

              </table>


            </div>
        </div>
    </body>
</html>
