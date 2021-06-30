<template>
  <div class="card-body login-card-body">
    <p class="login-box-msg">Iniciar sesión</p>

    <form action="">
      <div class="input-group mb-3">
        <input
          id="email"
          placeholder="Email"
          type="email"
          class="input-group-append"
          name="email"
          v-model="email"
          value="form-control"
          required
          autocomplete="email"
          autofocus
        />
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input
          id="password"
          placeholder="Contraseña"
          type="password"
          class="form-control"
          name="password"
          v-model="password"
          required
          autocomplete="current-password"
        />
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-8">
          <div class="icheck-primary">
            <input type="checkbox" id="remember" />
            <label for="remember"> Recordarme </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
          <button
            type="button"
            @click.prevent="login()"
            class="btn btn-primary btn-block"
          >
            Ingresar
          </button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
</template>
<script>
import Swal from "sweetalert2";

export default {
  data() {
    return {
      email: null,
      password: null,
      token: null,
      emailUsuario: null,
      id_usuario: null,
      rol_id: null,
      token_type: null,
      user: [],
    };
  },

  mounted() {},

  methods: {
    login() {
      let form = {
        email: this.email,
        password: this.password,
      };
      axios
        .post("/api/user/login", form, {})
        .then((res) => {
          console.log((this.token = res.data.access_token));
          let token = this.token;
          if (res.data.rol_id == 2) {
            localStorage.setItem("personal_access_token", res.data.access_token);
            location.href = "/";
          } else if (res.data.rol_id == 1) {
            console.log(
              localStorage.setItem("personal_access_token", res.data.access_token)
            );
            location.href = "/";
          } else if (res.data.status == "0") {
            Swal.fire({
              title: "Error, usuario o contraseña incorrecto",
              icon: "warning",
            });
          }
        })
        .catch((error) => {
          let errorObject = JSON.parse(JSON.stringify(error));
        });
    },
  },
};
</script>