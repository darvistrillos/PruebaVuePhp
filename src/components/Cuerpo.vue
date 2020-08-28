<template>
  <div style="margin-top:60px;">
    <b-container id="cuerpo-cont">
      <b-row>
        <b-col>
          <div>
            <img src="../assets/img/sigma-image.png" id="img-logo" />
          </div>
        </b-col>

        <b-col>
          <div id="pixels" class="rounde shadow">
            <br />

            <b-form id="custumer" name="custumer" >
                 <p v-if="errors.length">
                  <b>Por favor, corrija el(los) siguiente(s) error(es):</b>
                   <ul>
                     <li v-for="error in errors">{{ error }}</li>
                   </ul>
                 </p>
              <div id="labelform">Nombre*</div>

              <b-form-input
                id="jNombre"
                name="jNombre"
                class="mb-3 sizecon"
                v-model="objeto.jNombre"
                placeholder="Ingrese su nombre"
              ></b-form-input>

              <div id="labelform">Celular</div>

              <b-form-input
                id="jCelular"
                name="jCelular"
                class="mb-3 sizecon"
                v-model="objeto.jCelular"
                placeholder="Ingrese su celular"
                type="tel"
              ></b-form-input>

              <div id="labelform">Correo*</div>

              <b-form-input
                id="jEmail"
                name="jEmail"
                class="mb-3 sizecon"
                v-model="objeto.jEmail"
                type="email"
                placeholder="Ingrese su correo electronico"
                required
              ></b-form-input>

              <b-button
                id="BtnGuardar"
                name="BtnGuardar"
                class="colorboton"
                @click="checkForm"
              >ENVIAR</b-button>

              <br />

              <br />
            </b-form>
          </div>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      objeto: { jNombre: "", jEmail: "", jCelular: "" },
      info: [],
      boxOne: "",
      errors: [],
    };
  },
 /* mounted() {
    axios
      .get(
        "https://cors-anywhere.herokuapp.com/https://sigma-studios.s3-us-west-2.amazonaws.com/test/colombia.json"
      )
      .then((response) => (this.info = response));
  },*/
  methods: {
    Sendform() {
      axios
        .post("http://localhost/Contacts.php", this.createdFormData())
        .then((response) => {
          //alert(JSON.stringify(response.data));
          this.showMsgBoxOne();
        });
    },
    createdFormData: function () {
      var formDa = new FormData();
      for (var key in this.objeto) {
        formDa.append(key, this.objeto[key]);
      }

      return formDa;
    },
    showMsgBoxOne() {
      this.boxOne = "";
      this.$bvModal
        .msgBoxOk("Tu información ha sido recibida satisfactoriamente", {
          title: "Confirmacion de guardado",
          size: "md",
          buttonSize: "md",
          okVariant: "success",
          headerClass: "p-2 border-bottom-0",
          footerClass: "p-2 border-top-0",
          centered: true,
        })
        .then((value) => {
          this.boxOne = value;
        })
        .catch((err) => {
          // An error occurred
        });
    },
    checkForm: function (e) {
      /*if (this.objeto.jNombre && this.objeto.jCelular && this.objeto.jEmail) {
           this.Sendform();
        return true;
      }*/
      this.errors = [];
      if (!this.objeto.jNombre) {
        this.errors.push("El nombre es obligatorio.");
      }
      if (!this.objeto.jCelular) {
        this.errors.push("El celular es obligatorio");
      }
      if (!this.objeto.jEmail) {
        this.errors.push("El Email es obligatorio");
      }else if (!this.validEmail(this.objeto.jEmail)) {
        this.errors.push('El correo electrónico debe ser válido.');
      }
      if (!this.errors.length) {
        this.Sendform();
        return true;
      }
      e.preventDefault();
    },
    validEmail: function (email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }
  },
};
</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
