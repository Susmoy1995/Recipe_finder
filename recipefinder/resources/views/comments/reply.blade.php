
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reply</h4>
        </div>
        <div class="modal-body">
          
            <form class="form-signin" method="post" action="{{url('comments',['id'=>$single_post->post_id])}}">

              {{csrf_field()}}

               <input type="hidden" name="bl_id" value="{{session('user')->blogger_id}}">
              <input type="hidden" name="po_id" value="{{$single_post->post_id}}">
              <input type="hidden" name="c_id" value="{{$value->comment_id}}">

              <table>
                <tr>
                  <td>
                    <textarea name="reply" class="form-control" style="border-radius: 10px;width:570px" placeholder="write a reply"></textarea>
                  </td>
                </tr>

                <tr>
                  <td>
                    <br>
                     <input type="submit" value="reply" class="btn btn-success">
                  </td>
                </tr>
              </table>

             
              
             
          </form>


        </div>
        
      </div>
      
    </div>
  </div>
