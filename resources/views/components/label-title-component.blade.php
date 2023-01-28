<div class="card-body">
    <div class="mb-15 align-self-center">
        <div class="d-flex bd-highlight mb-4">
            <div class="align-self-start">
                <img class="img-fluid mr-30 " width="300px"
                     <?php
                     $src = url($image) ? $image : asset('assets/images/team/10.jpg');
                     ?>
                     src="{{$src}}"
                     style="border-radius: 50%" alt="">
            </div>
            <div class="p-2 bd-highlight align-self-center">
                <h5 class="text-justify" style="width: 25rem;">{{$name}}</h5>
                <h5 class="text-justify" style="width: 25rem;">
                    <i class="fa fa-bookmark-o mr-1"></i>
                    {{$id}}
                </h5>
            </div>
            <div class="d-flex w-100 bd-highlight align-self-center">
                <div class="p-2 w-100 bd-highlight align-self-center">
                    <h5 class="text-justify" style="width: 25rem;">
                        @if($other_icon)
                            <i class="fa {{$other_icon}}  mr-1"> </i>
                        @endif
                        {{$other}} </h5>
                    <h5 class="text-justify" style="width: 25rem;">
                        <i class="fa fa-calendar mr-1"> </i>
                        {{$date}}
                    </h5>

                </div>
                <div class="p-2 flex-shrink-1 bd-highlight">
                    <a class="button button-border gray small border float-end" style="width: 7rem;"
                       href="{{$updateButton??''}}">تعديل </a>

                    <form method="POST" enctype="multipart/form-data"
                          action="{{$deleteButton}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="button button-border gray small border float-end"
                               style="width: 7rem;"
                               value="حذف">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

