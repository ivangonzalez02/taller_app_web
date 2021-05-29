
const urlApi = "http://localhost/taller_citas/citas";
let listaCitas = [];
let idCitas = 0;
let cita = null;

function indexApi() {
    let response = null;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.response);
            console.log(response);
            listaEstudiantes = response.data;
            asignarDatosTablaHtml();
        }
    };
    xhttp.open("GET", urlApi, true);
    xhttp.send();
}
indexApi();

function asignarDatosTablaHtml() {
    let html = '';
    for (let item of listaCitas) {
        console.log(item);
        html += '<tr>';
        html += '    <td>' + item.fecha + '</td>';
        html += '    <td>' + item.hora + '</td>';
        html += '    <td>' + item.persona_id + '</td>';
        html += '    <td>' + item.especializacion_id + '</td>';
        html += '    <td>';
        html += '        <div class="contentButtons">';
        html += '           <button class="contentButtons__button contentButtons__button-verde" onclick="ver(' + item.id + ')">Ver detalle</button>';
        html += '           <button class="contentButtons__button contentButtons__button-azul" onclick="modificar(' + item.id + ')">Modificar</button>';
        html += '           <button class="contentButtons__button contentButtons__button-rojo" onclick="eliminar(' + item.id + ')">Eliminar</button>';
        html += '        <div>';
        // html += '        <div class="contentButtons">';
        // html += '           <button class="button verde" onclick="ver(' + item.id + ')">Ver detalle</button>';
        // html += '           <button class="button azul" onclick="modificar(' + item.id + ')">Modificar</button>';
        // html += '           <button class="button rojo" onclick="eliminar(' + item.id + ')">Eliminar</button>';
        // html += '        <div>';
        html += '    </td>';
        html += '</tr>';
    }
    if (html == '') {
        html += '<tr>';
        html += '    <td class="3">No hay datos registrados</td>';
        html += '</tr>';
    }
    const element = document.getElementById('listaCitas').getElementsByTagName('tbody')[0];
    element.innerHTML = html;
}

function datailApi() {
    let response = null;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.response);
            console.log(response);
            cita = response.data;
        }
    };
    xhttp.open("GET", urlApi + '/' + idCitas, false);
    xhttp.send();
}


function saveDataForm(event) {
    event.preventDefault();
    let data = 'fecha=' + document.getElementById('fecha').value;
    data += '&hora=' + document.getElementById('hora').value;
    data += '&persona-id=' + document.getElementById('persona_id').value;
    data += '&especializacion_id=' + document.getElementById('especializacion_id').value;
    save(data);
}

function save(data) {
    let reponse = null;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            reponse = JSON.parse(this.response);
            console.log(reponse);
            indexApi();
            onClickCancelar();
        }
    };
    let param = idCitas > 0 ? '/' + idCitas : '';
    let metodo = idCitas > 0 ? 'PUT' : 'POST';
    xhttp.open(metodo, urlApi + param, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
}

function crear() {
    idCitas = 0;
    cita = null;
    const elementTitulo = document.getElementById('controlForm').getElementsByTagName('h2')[0];
    elementTitulo.innerText = 'Registrar datos estudiante';
    document.getElementById('fecha').value = '';
    document.getElementById('hora').value = '';
    document.getElementById('persona_id').value = '';
    document.getElementById('especializacion_id').value = '';
    document.getElementsByClassName('popupControll')[0].classList.remove('popupControll-cerrar');
}

function modificar(id) {
    console.log(id);
    idCitas = id;
    cita = null;
    const elementTitulo = document.getElementById('controlForm').getElementsByTagName('h2')[0];
    elementTitulo.innerText = 'Modificar datos cita';
    datailApi();
    if (estudiante != null) {
        document.getElementById('fecha').value = cita.fecha;
        document.getElementById('hora').value = cita.hora;
        document.getElementById('persona_id').value = cita.persona_id;
        document.getElementById('especializacion_id').value = cita.especializacion_id;
        document.getElementsByClassName('popupControll')[0].classList.remove('popupControll-cerrar');
    }
}

function eliminar(id) {
    console.log(id);
    idCitas = id;
    document.getElementsByClassName('popupControll')[2].classList.remove('popupControll-cerrar');
}

function onClickSi() {
    let response = null;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.response);
            console.log(response);
            idCitas = 0;
            cita = null;
            indexApi();
            document.getElementsByClassName('popupControll')[2].classList.add('popupControll-cerrar');
        }
    };
    xhttp.open("DELETE", urlApi + '/' + idCitas, false);
    xhttp.send();
}

function onClickNo() {
    document.getElementsByClassName('popupControll')[2].classList.add('popupControll-cerrar');
}

function ver(id) {
    console.log(id);
    idCitas = id;
    cita = null;
    datailApi();
    if (cita != null) {
        document.getElementById('fechaLb').innerText = clase.fecha;
        document.getElementById('horaLb').innerText = clase.hora;
        document.getElementById('persona_idLb').innerText = clase.persona_id;
        document.getElementById('especializacion_idLb').innerText = clase.especializacion_id;
        document.getElementsByClassName('popupControll')[1].classList.remove('popupControll-cerrar');
    }
}

function onClickCancelar() {
    document.getElementsByClassName('popupControll')[0].classList.add('popupControll-cerrar');
}

function onClickCerrar() {
    document.getElementsByClassName('popupControll')[1].classList.add('popupControll-cerrar');
}


