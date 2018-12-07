/* trecho dedicado às máscaras dos campos dos formulários */

function mascara(i){
	
	var v = i.value;
	var t = i.id;
	var j;
	
	if((t!='oper')&&(t!='desc')){
		v=v.replace(" ","");
		v=v.replace("/","");
		v=v.replace(":","");
		v=v.replace("-","");
		v=v.replace(".","");
		v = v.replace(/\D/g,"");
	}			
			
	if(t == "data"){
		i.setAttribute("maxlength", "10");
		if (v.length > 4) {
			v = v.replace(/^(\d{2})(\d{2})(\d{1,4}).*/,"$1/$2/$3");
		}
		else if (v.length > 2) {
			v = v.replace(/^(\d{2})(\d{1,2})/,"$1/$2");
		}
	}

	if(t == "hora"){
		i.setAttribute("maxlength", "5");
		if (v.length > 2) {
			v = v.replace(/^(\d{2})(\d{1,2}).*/,"$1:$2");
		}
	}
	
	if(t == "cpf"){
		i.setAttribute("maxlength", "14");
		if (v.length > 9) {
			v = v.replace(/^(\d{3})(\d{3})(\d{3})(\d{1,2}).*/,"$1.$2.$3-$4");
		}
		else if (v.length > 6) {
			v = v.replace(/^(\d{3})(\d{3})(\d{1,3}).*/,"$1.$2.$3");
		}
		else if (v.length > 3) {
			v = v.replace(/^(\d{3})(\d{1,3})/,"$1.$2");
		}
	}

	if(t == "cnpj"){
		i.setAttribute("maxlength", "18");
		if (v.length > 12) {
			v = v.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{1,2}).*/,"$1.$2.$3/$4-$5");
		}
		else if (v.length > 8) {
			v = v.replace(/^(\d{2})(\d{3})(\d{3})(\d{1,4}).*/,"$1.$2.$3/$4");
		}
		else if (v.length > 5) {
			v = v.replace(/^(\d{2})(\d{3})(\d{1,3}).*/,"$1.$2.$3");
		}
		else if (v.length > 2) {
			v = v.replace(/^(\d{2})(\d{1,3})/,"$1.$2");
		}
	}

	if(t == "cep"){
		i.setAttribute("maxlength", "10");
		if (v.length > 5) {
			v = v.replace(/^(\d{2})(\d{3})(\d{1,3}).*/,"$1.$2-$3");
		}
		else if (v.length > 2) {
			v = v.replace(/^(\d{2})(\d{1,3})/,"$1.$2");
		}
	}

	if(t == "tel"){
		i.setAttribute("maxlength", "13");
		if (v.length > 6) {
			v = v.replace(/^(\d{2})(\d{4})(\d{1,4}).*/,"($1)$2-$3");
		}
		else if (v.length > 2) {
			v = v.replace(/^(\d{2})(\d{1,4})/,"($1)$2");
		}
	}
  
	if(t == "cel"){
		i.setAttribute("maxlength", "14");
		if (v.length > 10) {
			v = v.replace(/^(\d{2})(\d{5})(\d{1,4}).*/,"($1)$2-$3");
		}
		else if (v.length > 6) {
			v = v.replace(/^(\d{2})(\d{4})(\d{1,4}).*/,"($1)$2-$3");
		}
		else if (v.length > 2) {
			v = v.replace(/^(\d{2})(\d{1,4})/,"($1)$2");
		}
	}
	if(t == "oper"){
		i.setAttribute("maxlength", "20");
	}
	if(t == "desc"){
		i.setAttribute("maxlength", "45");
	}
	i.value=v;
}