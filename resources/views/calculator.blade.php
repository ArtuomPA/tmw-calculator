@extends("layout")

@section("title")
Калькулятор
@endsection


@section("main-content")
      <section>
         <article>
            <h2>Калькулятор характеристик персонажа</h2>
            
            <h3>Введите исходные данные:</h3>
         
            <form method="post" id="calculator-input" action="#">
            	<table>
                  	<tr>
                    	<td>Выносливость</td>
                    	<td><input autofocus required class="form-control" name="agility" id="agility" placeholder="Введите значение выносливости" type="number"/></td>
                  	</tr>
                  	<tr>
                    	<td>Ловкость</td>
                    	<td><input required class="form-control" name="dexterity" id="dexterity" placeholder="Введите значение ловкости" type="number"/></td>
                  	</tr>
                  	<tr>
                    	<td>Живучесть</td>
                    	<td><input required class="form-control" name="vitality" id="vitality" placeholder="Введите значение живучести" type="number"/></td>
                  	</tr>
                  	<tr>
                    	<td>Удача</td>
                    	<td><input required class="form-control" name="luck" id="luck" placeholder="Введите значение удачи" type="number"/></td>
                  	</tr>
                  	<tr>
                    	<td>Интеллект</td>
                    	<td><input required class="form-control" name="intelligence" id="intelligence" placeholder="Введите значение интеллекта" type="number"/></td>
                  	</tr>
                  	<tr>
                    	<td>Сила</td>
                    	<td><input required class="form-control" name="strength" id="strength" placeholder="Введите значение силы" type="number"/></td>
                  	</tr>
                </table>
                <input type="submit" class="btn btn-success" value="Рассчитать">	
            </form>
            <div id="summary">
            </div>
         </article>
      </section>
@endsection

@section("specific-scripts")
<script>
	$(document).ready(function() {
      	$('#calculator-input').on('submit', function(e){
        	e.preventDefault();
        	
        	var formData = {
        		_token: "{{ csrf_token() }}",
                agility: jQuery('#agility').val(),
                dexterity: jQuery('#dexterity').val(),
                vitality: jQuery('#vitality').val(),
                luck: jQuery('#luck').val(),
                intelligence: jQuery('#intelligence').val(),
                strength: jQuery('#strength').val()
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
    });
</script>
@endsection