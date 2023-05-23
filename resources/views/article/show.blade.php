@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                    <nav class="navbar navbar-expand-sm navbar-light bg-light">
                        <a class="navbar-brand" href="#">{{trans('main.article_details')}}</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                        aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent1">



                            {{-- start of buttons --}}
                    <span class="navbar-nav ml-auto">
                        <button class="btn btn-sm btn-primary" id="reset">{{trans('main.reset')}}</button>
                                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right mx-2" data-toggle="modal" data-target="#exampleModal">
    <i class="fas fa-cog"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{trans('main.settings')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- Modal body --}}
          <form>
            <div class="form-group">
                <label for="method">{{trans('main.method')}}</label>
                  <select class="form-control" id="method">
                    <option disabled selected value> {{trans('main.s_method')}}</option>
                    <option value="word">{{trans('main.word')}}</option>
                    <option id="highlight" value="highlight">{{trans('main.letter')}}</option>
                    <option id="highlightOver" value="highlightOver">{{trans('main.highlight')}}</option>
                  </select>
            </div>
            <div class="form-group">
                <label for="textSize">{{trans('main.text_size')}}</label>
                  <select class="form-control" id="textSize">
                    <option disabled selected value>{{trans('main.s_size')}}</option>
                    <option value="10">10</option>
                    <option value="12">12</option>
                    <option value="14">14</option>
                    <option value="16">16</option>
                    <option value="18">18</option>
                    <option value="20">20</option>
                  </select>
            </div>
            <div id="wordFormGroup" class="form-group">
                <label for="wordSpeed">{{trans('main.speed')}}</label>
                  <select class="form-control" id="wordSpeed">
                    <option disabled selected value>{{trans('main.s_speed')}}</option>
                    <option value="1200">50 {{trans('main.wpm')}}</option>
                    <option value="600">100 {{trans('main.wpm')}}</option>
                    <option value="400">150 {{trans('main.wpm')}}</option>
                    <option value="300">200 {{trans('main.wpm')}}</option>
                    <option value="240">250 {{trans('main.wpm')}}</option>
                    <option value="200">300 {{trans('main.wpm')}}</option>
                  </select>
            </div>
            <div id="highlightFormGroup" class="form-group d-none">
                <label for="highlightSpeed">{{trans('main.speed')}}</label>
                  <select class="form-control" id="highlightSpeed">
                    <option disabled selected value>{{trans('main.s_speed')}}</option>
                    <option value="1200">50 {{trans('main.wpm')}}</option>
                    <option value="600">100 {{trans('main.wpm')}}</option>
                    <option value="400">150 {{trans('main.wpm')}}</option>
                    <option value="300">200 {{trans('main.wpm')}}</option>
                    <option value="240">250 {{trans('main.wpm')}}</option>
                    <option value="200">300 {{trans('main.wpm')}}</option>
                  </select>
            </div>
            <div id="textColor" class="form-group d-none">
                <label for="color">{{trans('main.color')}}</label>
                <select class="form-control" id="color">
                    <option disabled selected value>{{trans('main.s_text_color')}}</option>
                    <option  value="red">{{trans('main.red')}}</option>
                    <option value="black">{{trans('main.black')}}</option>
                    <option value="blue">{{trans('main.blue')}}</option>
                    <option value="green">{{trans('main.green')}}</option>
                  </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('main.close')}}</button>
        </div>
      </div>
    </div>
  </div>

                    </span>
                            {{-- End of buttons --}}


                        </div>
                      </nav>

                <div class="card-body">
                    <b>{{$article->title}}</b>
                <hr>


                <div id="text" class="card-text">
                    {{-- <div id="shadow">{{$article->content}}</div>
                    <div id="content"></div> --}}
                    <div style="position: relative">
                    <div id="shadow" style="position: absolute;left:0"></div>
                    <div id="content" style="z-index:-1;left:0">{{$article->content}}</div>
                    </div>
                </div>
                </div>
            </div>
            <button id="save" class="btn btn-primary mt-2">{{trans('main.save')}}</button>
                        {{-- <div><i class="fas fa-info-circle"></i> First, set your settings preferences <i class="fas fa-cog"></i> .</div>
            <div><i class="fas fa-info-circle"></i> Tab once on text to start, tab again to pause.</div>
            <div><i class="fas fa-info-circle"></i> Method change, and color change will reset reading.</div> --}}
        </div>
    </div>
</div>
@endsection



<script>
    // let article = {!! json_encode($article->content)!!};
    let articleObj = {{$article->id}};
</script>
