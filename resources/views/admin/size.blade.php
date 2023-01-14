@extends('admin_layout.master')

@section('title')
    Settings
@endsection

@section('content')
    <!-- start content -->
    <div class="content-wrapper">
        <section class="content-header">
           <div class="content-header-left">
              <h1>View Sizes</h1>
           </div>
           <div class="content-header-right">
              <a href="{{url('admin/addsize')}}" class="btn btn-primary btn-sm">Add New</a>
           </div>
        </section>
        @if (Session::has('status'))
            <section class="content" style="min-height:auto;margin-bottom: -30px;">
               <div class="row">
                  <div class="col-md-12">
                     <div class="callout callout-success">
                     <p>{{Session::get('status')}}</p>
                     </div>
                  </div>
               </div>
            </section>
        @endif
        <section class="content">
           <div class="row">
              <div class="col-md-12">
                 <div class="box box-info">
                    <div class="box-body table-responsive">
                       <table id="example1" class="table table-bordered table-hover table-striped">
                          <thead>
                             <tr>
                                <th>#</th>
                                <th>Size Name</th>
                                <th>Action</th>
                             </tr>
                          </thead>
                          <tbody>
                           @foreach ($sizes as $size)
                              <tr>
                                 <td>{{$increment++}}</td>
                                 <td>{{$size->size_name}}</td>
                                 <td style=" display : flex; margin-left: 2px; ">
                                    <a href="{{ url('admin/editsize', [$size->id]) }}" class="btn btn-primary btn-xs">Edit</a>
                                    <form action=" {{ url('admin/deletesize', [$size->id]) }} " method="POST">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-danger btn-xs" style=" margin-left: 2px; ">Delete</button>

                                       {{-- <a href="#" class="btn btn-danger btn-xs" data-href="{{ url('admin/deletesize', [$size->id]) }}" data-toggle="modal" data-target="#confirm-delete" style=" margin-left: 2px; ">Delete</a> --}}
                                    </form>
                                 </td>
                              </tr> 
                           @endforeach
                           {{-- 
                              
                              <tr>
                                <td>1</td>
                                <td>XS</td>
                                <td>
                                   <a href="size-edit.php?id=1" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=1" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>2</td>
                                <td>S</td>
                                <td>
                                   <a href="size-edit.php?id=2" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=2" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>3</td>
                                <td>M</td>
                                <td>
                                   <a href="size-edit.php?id=3" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=3" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>4</td>
                                <td>L</td>
                                <td>
                                   <a href="size-edit.php?id=4" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=4" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>5</td>
                                <td>XL</td>
                                <td>
                                   <a href="size-edit.php?id=5" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=5" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>6</td>
                                <td>XXL</td>
                                <td>
                                   <a href="size-edit.php?id=6" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=6" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>7</td>
                                <td>3XL</td>
                                <td>
                                   <a href="size-edit.php?id=7" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=7" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>8</td>
                                <td>31</td>
                                <td>
                                   <a href="size-edit.php?id=8" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=8" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>9</td>
                                <td>32</td>
                                <td>
                                   <a href="size-edit.php?id=9" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=9" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>10</td>
                                <td>33</td>
                                <td>
                                   <a href="size-edit.php?id=10" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=10" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>11</td>
                                <td>34</td>
                                <td>
                                   <a href="size-edit.php?id=11" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=11" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>12</td>
                                <td>35</td>
                                <td>
                                   <a href="size-edit.php?id=12" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=12" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>13</td>
                                <td>36</td>
                                <td>
                                   <a href="size-edit.php?id=13" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=13" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>14</td>
                                <td>37</td>
                                <td>
                                   <a href="size-edit.php?id=14" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=14" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>15</td>
                                <td>38</td>
                                <td>
                                   <a href="size-edit.php?id=15" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=15" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>16</td>
                                <td>39</td>
                                <td>
                                   <a href="size-edit.php?id=16" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=16" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>17</td>
                                <td>40</td>
                                <td>
                                   <a href="size-edit.php?id=17" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=17" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>18</td>
                                <td>41</td>
                                <td>
                                   <a href="size-edit.php?id=18" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=18" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>19</td>
                                <td>42</td>
                                <td>
                                   <a href="size-edit.php?id=19" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=19" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>20</td>
                                <td>43</td>
                                <td>
                                   <a href="size-edit.php?id=20" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=20" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>21</td>
                                <td>44</td>
                                <td>
                                   <a href="size-edit.php?id=21" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=21" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>22</td>
                                <td>45</td>
                                <td>
                                   <a href="size-edit.php?id=22" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=22" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>23</td>
                                <td>46</td>
                                <td>
                                   <a href="size-edit.php?id=23" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=23" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>24</td>
                                <td>47</td>
                                <td>
                                   <a href="size-edit.php?id=24" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=24" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>25</td>
                                <td>48</td>
                                <td>
                                   <a href="size-edit.php?id=25" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=25" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>26</td>
                                <td>Free Size</td>
                                <td>
                                   <a href="size-edit.php?id=26" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=26" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>27</td>
                                <td>One Size for All</td>
                                <td>
                                   <a href="size-edit.php?id=27" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=27" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>28</td>
                                <td>10</td>
                                <td>
                                   <a href="size-edit.php?id=28" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=28" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>29</td>
                                <td>12 Months</td>
                                <td>
                                   <a href="size-edit.php?id=29" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=29" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>30</td>
                                <td>2T</td>
                                <td>
                                   <a href="size-edit.php?id=30" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=30" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>31</td>
                                <td>3T</td>
                                <td>
                                   <a href="size-edit.php?id=31" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=31" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>32</td>
                                <td>4T</td>
                                <td>
                                   <a href="size-edit.php?id=32" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=32" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>33</td>
                                <td>5T</td>
                                <td>
                                   <a href="size-edit.php?id=33" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=33" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>34</td>
                                <td>6 Years</td>
                                <td>
                                   <a href="size-edit.php?id=34" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=34" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>35</td>
                                <td>7 Years</td>
                                <td>
                                   <a href="size-edit.php?id=35" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=35" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>36</td>
                                <td>8 Years</td>
                                <td>
                                   <a href="size-edit.php?id=36" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=36" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>37</td>
                                <td>10 Years</td>
                                <td>
                                   <a href="size-edit.php?id=37" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=37" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>38</td>
                                <td>12 Years</td>
                                <td>
                                   <a href="size-edit.php?id=38" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=38" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>39</td>
                                <td>14 Years</td>
                                <td>
                                   <a href="size-edit.php?id=39" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=39" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>40</td>
                                <td>256 GB</td>
                                <td>
                                   <a href="size-edit.php?id=40" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=40" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>41</td>
                                <td>128 GB</td>
                                <td>
                                   <a href="size-edit.php?id=41" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=41" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>42</td>
                                <td>14 Plus</td>
                                <td>
                                   <a href="size-edit.php?id=42" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=42" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>43</td>
                                <td>16 Plus</td>
                                <td>
                                   <a href="size-edit.php?id=43" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=43" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>44</td>
                                <td>18 Plus</td>
                                <td>
                                   <a href="size-edit.php?id=44" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=44" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>45</td>
                                <td>20 Plus</td>
                                <td>
                                   <a href="size-edit.php?id=45" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=45" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>46</td>
                                <td>22 Plus</td>
                                <td>
                                   <a href="size-edit.php?id=46" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=46" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr>
                             <tr>
                                <td>47</td>
                                <td>24 Plus</td>
                                <td>
                                   <a href="size-edit.php?id=47" class="btn btn-primary btn-xs">Edit</a>
                                   <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=47" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                             </tr> 
                           --}}
                          </tbody>
                       </table>
                    </div>
                 </div>
        </section>
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
                 </div>
                 <div class="modal-body">
                 Are you sure want to delete this item?
                 </div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                 </div>
              </div>
           </div>
        </div>
    </div>
    <!-- end content -->
@endsection