@extends("layout")

@section("title")
Калькулятор
@endsection


@section("main-content")
      <section>
         <article>
            <h2>Калькулятор характеристик персонажа</h2>
            
         	<div class="row">
             	<div class="col-sm-4">
                    <form method="post" id="calculator-ajax" action="#">
                    	<table>
                          	<tr>
                            	<td>Выносливость</td>
                            	<td><input autofocus required class="form-control" name="agility" id="agility-ajax" placeholder="Введите значение выносливости" type="number"/></td>
                          	</tr>
                          	<tr>
                            	<td>Ловкость</td>
                            	<td><input required class="form-control" name="dexterity" id="dexterity-ajax" placeholder="Введите значение ловкости" type="number"/></td>
                          	</tr>
                          	<tr>
                            	<td>Живучесть</td>
                            	<td><input required class="form-control" name="vitality" id="vitality-ajax" placeholder="Введите значение живучести" type="number"/></td>
                          	</tr>
                          	<tr>
                            	<td>Удача</td>
                            	<td><input required class="form-control" name="luck" id="luck-ajax" placeholder="Введите значение удачи" type="number"/></td>
                          	</tr>
                          	<tr>
                            	<td>Интеллект</td>
                            	<td><input required class="form-control" name="intelligence" id="intelligence-ajax" placeholder="Введите значение интеллекта" type="number"/></td>
                          	</tr>
                          	<tr>
                            	<td>Сила</td>
                            	<td><input required class="form-control" name="strength" id="strength-ajax" placeholder="Введите значение силы" type="number"/></td>
                          	</tr>
                        </table>
                        
                        <br>
                        <input type="submit" class="btn btn-success" value="Рассчитать">	
                    </form>
                </div>
                
                <div class="col-sm-8">
                    <form method="post" id="calculator" action="/save/{{ $buildId }}">
                    	<input hidden="true" required class="form-control" name="agility" id="agility" placeholder="Введите значение выносливости" type="number"/>
                        <input hidden="true" required class="form-control" name="dexterity" id="dexterity" placeholder="Введите значение ловкости" type="number"/>
                        <input hidden="true" required class="form-control" name="vitality" id="vitality" placeholder="Введите значение живучести" type="number"/>
                        <input hidden="true" required class="form-control" name="luck" id="luck" placeholder="Введите значение удачи" type="number"/>
                        <input hidden="true" required class="form-control" name="intelligence" id="intelligence" placeholder="Введите значение интеллекта" type="number"/>
                        <input hidden="true" required class="form-control" name="strength" id="strength" placeholder="Введите значение силы" type="number"/>
                        <p>Заголовок</p>
                        <input required class="form-control" name="title" id="title" placeholder="Введите заголовок" type="text"/>
                        <p>Описание</p>
                        <textarea class="form-control" name="description" id="description" placeholder="Введите текст описания (не обязательно)" rows="4"></textarea> 
                        
                        @csrf
                        
                        <br>
                        <input type="submit" class="btn btn-success" value="Сохранить">	
                    </form>
                </div>
            </div>
            
            <div id="summary">
            </div>
         </article>
      </section>
@endsection

@section("specific-scripts")
<script>
	$(document).ready(function() {
      	$('#calculator-ajax').on('submit', function(e){
        	e.preventDefault();
        	
        	var formData = {
        		_token: "{{ csrf_token() }}",
                agility: jQuery('#agility-ajax').val(),
                dexterity: jQuery('#dexterity-ajax').val(),
                vitality: jQuery('#vitality-ajax').val(),
                luck: jQuery('#luck-ajax').val(),
                intelligence: jQuery('#intelligence-ajax').val(),
                strength: jQuery('#strength-ajax').val()
        	};
        	
        	$.ajax({
                type: "POST",
                url: "/ajax/calculate",
                data: formData,
                dataType: 'html',
                success: function (data) {
                    $('#summary').html(data);
                },
                error: function (data) {
                    console.log(data);
                }
            });
      	});
      	
      	$("#agility-ajax").change(function(){
      		$("#agility").val($(this).val());
      	});
      	$("#dexterity-ajax").change(function(){
      		$("#dexterity").val($(this).val());
      	});
      	$("#vitality-ajax").change(function(){
      		$("#vitality").val($(this).val());
      	});
      	$("#luck-ajax").change(function(){
      		$("#luck").val($(this).val());
      	});
      	$("#intelligence-ajax").change(function(){
      		$("#intelligence").val($(this).val());
      	});
      	$("#strength-ajax").change(function(){
      		$("#strength").val($(this).val());
      	});
    });
</script>
@endsection