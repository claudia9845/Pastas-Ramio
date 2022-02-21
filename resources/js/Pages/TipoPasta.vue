<template>
  <app-layout title="Tipo Pastas">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tipo Pastas</h2>
    </template>

    <div class="overflow-x-auto" v-if="tipoAccion == 0">
      <div
        class="
          min-w-screen
          bg-gray-100
          flex
          items-center
          justify-center
          d-grid
          gap-2
          d-md-flex
          bg-gray-100
          font-sans
          overflow-hidden
        "
      >
        <div class="w-full lg:w-3/6 d-grid gap-2 d-md-flex">
          <div class="bg-white shadow-md rounded my-6">
            <div class="bg-gray-100 min-w-max w-full">
              <button
                type="button d-grid gap-1 d-md-flex"
                @click="abrirTipoPasta"
                class="
                  py-1
                  px-2
                  bg-gradient-to-r
                  from-indigo-500
                  via-green-700
                  to-blue-600
                  hover:from-indigo-600 hover:via-gray-600 hover:to-waith-600
                  focus:outline-none
                  text-white
                  uppercase
                  font-bold
                  rounded-lg
                  mx-auto
                  p-4
                "
              >
                <div class="flex sm:flex-cols- gap-2">
                  <div class="col-span-1">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-6 w-6 text-white"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                      />
                    </svg>
                  </div>
                  <div class="col-span-2">Nuevo</div>
                </div>
              </button>
            </div>

            <table class="min-w-max w-full table-fixed">
              <thead>
                <tr
                  class="
                    bg-gray-600
                    text-white
                    uppercase
                    text-sm
                    leading-normal
                  "
                >
                  <th class="py-3 px-6 text-left">Nombre</th>
                  <th class="py-3 px-6">Acciones</th>
                </tr>
              </thead>
              <tbody class="text-gray-600 text-sm font-light">
                <tr
                  v-for="(objeto, index) in arrayData"
                  :key="index"
                  class="border-b border-gray-200 hover:bg-gray-100"
                >
                  <td class="py-3 px-6 text-left whitespace-nowrap">
                    <div class="flex items-center">
                      <span class="font-medium"> {{ objeto.nombre }}</span>
                    </div>
                  </td>
                  <td class="py-3 px-6">
                    <div class="flex item-center justify-center">
                      <div
                        class="
                          w-4
                          mr-2
                          transform
                          hover:text-blue-500 hover:scale-110
                        "
                        title="Ver"
                        @click="verTipoPasta"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                          />
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                          />
                        </svg>
                      </div>
                      <div
                        class="
                          w-4
                          mr-2
                          transform
                          hover:text-green-500 hover:scale-110
                        "
                        title="Actualizar"
                        @click="editarTipoPasta(objeto)"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                          />
                        </svg>
                      </div>
                      <div
                        class="
                          w-4
                          mr-2
                          transform
                          hover:text-red-500 hover:scale-110
                        "
                        title="Eliminar"
                        @click="eliminarTipoPasta(objeto)"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                          />
                        </svg>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="overflow-x-auto mb-4" v-if="tipoAccion == 1">
      <div class="flex justify-center items-center bg-gray-200 antialiased">
        <div
          class="
            flex flex-col
            w-11/12
            sm:w-5/6
            lg:w-1/2
            max-w-2xl
            mx-auto
            rounded-lg
            border border-gray-300
            shadow-xl
          "
        >
          <div
            class="
              flex flex-row
              justify-between
              p-6
              bg-white
              border-b border-gray-200
              rounded-tl-lg rounded-tr-lg
            "
          >
            <p class="font-semibold text-gray-800 text-3xl" v-text="tittle"></p>
            <svg
              class="w-6 h-6"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                @click="cerrar"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              ></path>
            </svg>
          </div>
          <div class="flex flex-col px-6 py-5 bg-gray-50">
            <p class="mb-2 font-semibold text-gray-700">Agregue una tipo de pasta</p>
            <input
              v-model="nombre"
              type="text"
              name=""
              placeholder="Ingresa un nombre"
              class="
                p-5
                mb-5
                bg-white
                border border-gray-200
                rounded
                shadow-sm
                h-12
              "
            />
           
            <hr />
          </div>
          <div
            class="
              flex flex-row
              items-center
              justify-end
              p-5
              bg-white
              border-t border-gray-200
              rounded-bl-lg rounded-br-lg
            "
          >
            <button
              @click="cerrar"
              class="
                px-4
                py-2
                mr-5
                text-white
                font-semibold
                bg-gray-500
                rounded
              "
            >
              Cerrar
            </button>
            <button
              v-if="boton == false"
              @click="regTipoPasta"
              class="px-4 py-2 text-white font-semibold bg-blue-500 rounded"
            >
              Guardar
            </button>
            <button
              v-else
              @click="actTipoPasta"
              class="px-4 py-2 text-white font-semibold bg-blue-500 rounded"
            >
              Actualizar
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="overflow-x-auto mb-12" v-if="tipoAccion == 2">
      <div
        class="
          flex flex-col
          space-y-4
          min-w-screen
          bg-opacity-25
          h-screen
          animated
          fadeIn
          faster
          fixed
          left-0
          top-0
          flex
          justify-center
          items-center
          inset-0
          z-50
          outline-none
          focus:outline-none
          bg-gray-900
        "
      >
        <div
          class="
            flex flex-col
            p-8
            bg-gray-800
            shadow-md
            hover:shodow-lg
            rounded-2xl
          "
        >
          <div class="flex items-center justify-between">
            <div class="flex items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="
                  w-16
                  h-16
                  rounded-2xl
                  p-3
                  border border-gray-800
                  text-blue-400
                  bg-gray-900
                "
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                ></path>
              </svg>
              <div class="flex flex-col ml-3">
                <div class="font-medium leading-none text-gray-100">
                  Eliminar el tipo de pasta {{ nomTip }}?
                </div>
                <p class="text-sm text-white leading-none mt-1">
                  Este proceso es irreversible!
                </p>
              </div>
            </div>
            <button
              @click="cerrar"
              class="
                flex-no-shrink
                bg-gray-500
                px-5
                ml-4
                py-2
                text-sm
                shadow-sm
                hover:shadow-lg
                font-medium
                tracking-wider
                border-2 border-gray-500
                text-white
                rounded-full
              "
            >
              NO
            </button>
            <button
              @click="destroyTipoPasta"
              class="
                flex-no-shrink
                bg-red-500
                px-5
                ml-4
                py-2
                text-sm
                shadow-sm
                hover:shadow-lg
                font-medium
                tracking-wider
                border-2 border-red-500
                text-white
                rounded-full
              "
            >
              SI
            </button>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";

export default defineComponent({
  components: {
    AppLayout,
  },
  data() {
    return {
      tipoAccion: 0,
      tittle: "",
      nombre: "",
      nomTip: "",
      idTip: 0,
      arrayData: [],
      boton: true,
    };
  },
  // props:['marca'],

  methods: {
    listarDatos() {
      let me = this;
      var url = "/api/tipopasta/data";

      axios
        .get(url)
        .then(function (response) {
          var respuesta = response.data;
          me.arrayData = respuesta.TipoPasta;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    abrirTipoPasta() {
      this.tittle = "Registrar tipo de pasta";
      this.tipoAccion = 1;
      this.boton = false;
      this.limpiar();
    },
    regTipoPasta() {
      let me = this;
      var url = "/api/tipopasta/registrar";
      axios
        .post(url, {
          nombre: this.nombre,
        })
        .then(function (response) {
          me.listarDatos();
          alert("Registro guardado exitosamente!");
          me.cerrar();
        })
        .catch(function (error) {
          console.log(error.message);
        });
    },
    editarTipoPasta(data = []) {
      this.tittle = "Actualizar tipo de pasta";
      this.tipoAccion = 1;
      this.idTip = data["id"];
      this.nombre = data["nombre"];
    },
    actTipoPasta() {
      let me = this;
      var url = "/api/tipopasta/actualizar";
      axios
        .put(url, {
          nombre: this.nombre,
          id: this.idTip,
        })
        .then(function (response) {
          me.listarDatos();
          alert("Registro actualizado exitosamente!");
          me.cerrar();
        })
        .catch(function (error) {
          console.log(error.message);
        });
    },
    eliminarTipoPasta(data = []) {
      this.tipoAccion = 2;
      this.idTip = data["id"];
      this.nomTip = data["nombre"];
    },
    destroyTipoPasta() {
      let me = this;
      var url = "/api/tipopasta/eliminar";

      axios
        .post(url, {
          id: this.idTip,
        })
        .then(function (response) {
          me.listarDatos();
          alert("Registro eliminado!");
          me.cerrar();
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    verTipoPasta() {
      alert("boton ver ok");
    },
    cerrar() {
      this.tipoAccion = 0;
    },
    limpiar() {
      this.nombre = "";
    },
  },
  mounted() {
    this.listarDatos();
  },
});
</script>
