(function ($, root, undefined) {
  $(function () {
    "use strict";
    $(window).on("load", function () {});
    $(window).on("scroll", function () {});
    $(document).ready(function () {
      app_init.ready();
    });
    const app_init = {
      ready: function ready() {
        app.init();
      },
    };
    const app = {
      init: function init() {
        // let payload = { method: '', data: {} }
        // app.db_req.send(payload, false).then((response) =>{
        // 	if(response.success){ }else{ }
        // });
        // AOS.init();
        app.general_js.init();
        // app.general_js.log_visitor();
        app.loadscripts.init();

        if ($("#hero-form-alt").length) {
          app.form_alt.init();
        } else if ($("#hero-form-rf").length) {
          app.form_recruit_first.init();
        } else if ($("#hero-full-pageform").length) {
          app.full_pageform.init();
        } else {
          app.form.init();
        }
      },
      general_js: {
        // new javscript by Pedro

        fadeOut: (targetParent, sibling) => {
          targetParent.animate({ opacity: 0 }, 500, () => {
            sibling.removeClass("d-none");
            targetParent.addClass("d-none");
            const progressBar = $(".steps-progress");
            let completedStep = progressBar.find(".step-completed");

            if (completedStep.length) {
              completedStep.next().addClass("step-completed");
              completedStep.next().next().addClass("current-step");
            } else {
              progressBar.children().eq(0).addClass("step-completed");
              progressBar.children().eq(1).addClass("current-step");
            }

            sibling.animate({ opacity: 1 }, 500, () => {});
          });
        },
        //------------------//
        init: function init() {
          if ($("[data-aos]").length) {
            //&& window.innerWidth > 580){

            // var aos = document.createElement('script');
            // aos.onload = function () {  };
            // aos.src = "https://cdnjs.cloudflare.com/ajax/libs/three.js/91/three.min.js"
            // document.body.appendChild(aos); //or something of the likes

            AOS.init({
              duration: 400, // values from 0 to 3000, with step 50ms
              easing: "ease", // default easing for AOS animations
              once: true,
            });
          } else {
            // $("[data-aos]").css("opacity", "1")
          }
          $(".cta.cta-prep-form").on("click", function (e) {
            e.preventDefault();
            $("html, body").animate(
              { scrollTop: $(".prep-form").position().top },
              "slow"
            );
          });

          $(".form-explain a").on("click", function (e) {
            e.preventDefault();
            $("html, body").animate(
              { scrollTop: $(".half-half-section").position().top },
              "slow"
            );
          });

          $(".cta.top-scroller").on("click", function (e) {
            e.preventDefault();
            // $("html, body").animate({ scrollTop: 0 }, "slow");
            document.location.href = "/steps";
          });

          $(".clients-slider").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            autoplay: true,
            autoplaySpeed: 700,
            responsive: [
              {
                breakpoint: 581,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  infinite: true,
                },
              },
            ],
          });

          // new javascript by Pedro

          $(".next").on("click", (event) => {
            event.preventDefault();
            let targetParent = $(event.target.parentNode);
            let sibling = targetParent.next();
            let values = [];
            targetParent.find("input").each(function () {
              values.push($(this).val());
            });
            let valid = values.every((e) => e !== "");

            if (valid) {
              this.fadeOut(targetParent, sibling);
            } else {
              alert("Please fill all the fields and Try again");
            }
          });
        },
        log_visitor: function log_visitor() {
          ///-------------------//
          let ref =
            $("header").attr("data-referrer") == "empty"
              ? "direct"
              : $("header").attr("data-referrer");
          let payload = {
            method: "log_visitor",
            data: {
              referrer: ref,
              page: $(".page-main-content").attr("data-page"),
            },
          };
          app.db_req.send(payload, false).then((response) => {
            // if (response.success) {
            //   // console.log("LOGGED VISIT")
            // }
          });
        },
        is_in_viewport: function is_in_viewport(elem) {
          var bounding = elem.getBoundingClientRect();
          return (
            bounding.top >= 0 &&
            bounding.left >= 0 &&
            bounding.bottom <=
              (window.innerHeight || document.documentElement.clientHeight) &&
            bounding.right <=
              (window.innerWidth || document.documentElement.clientWidth)
          );
        },

        will_be_in_viewport: function will_be_in_viewport(elem, space) {
          var bounding = elem.getBoundingClientRect();
          if (false && $(elem).hasClass("test-img")) {
            console.log("bounding.top " + bounding.top);
            console.log("window.innerHeight " + window.innerHeight);
          }
          return (
            bounding.top - space <=
              (window.innerHeight || document.documentElement.clientHeight) &&
            bounding.left >= 0 &&
            bounding.bottom >= 0 &&
            bounding.right <=
              (window.innerWidth || document.documentElement.clientWidth)
          );
        },
        wait_for_final_event: function wait_for_final_event(
          callback,
          ms,
          uniqueId
        ) {
          if (!uniqueId) {
            uniqueId = "Don't call this twice without a uniqueId";
          }
          if (timers[uniqueId]) {
            clearTimeout(timers[uniqueId]);
          }
          timers[uniqueId] = setTimeout(callback, ms);
        },
      },

      loadscripts: {
        init: function init() {
          let _this = this;

          $(window).bind("load", function () {
            setTimeout(function () {
              // data-8 service - phone, email
              var data_8 = _this.build_script();
              data_8.src =
                "https://webservices.data-8.co.uk/javascript/loader.ashx?key=" +
                api_key +
                "&load=InternationalTelephoneValidation,EmailValidation"; // live
              document.body.appendChild(data_8);

              // data-8 jquery validation
              var data_8_validate = _this.build_script();
              data_8_validate.src =
                "https://webservices.data-8.co.uk/javascript/jqueryvalidation_min.js";
              document.body.appendChild(data_8_validate);
            }, 200);
          });
        },
        build_script: function build_script() {
          var dynamic_script = document.createElement("script");
          dynamic_script.type = "text/javascript";
          dynamic_script.defer = true;
          return dynamic_script;
        },
      },
      form: {
        init: function init() {
          let _this = this;
          $("form#hero-form button").on("click", function (e) {
            e.preventDefault();
            $(this).attr("disabled", "disabled");
            $(".loader-modal").addClass("show-loader");
            if (_this.validate_form()) {
              _this.submit_lead_form_data();
            } else {
              $(".loader-modal").removeClass("show-loader");
              $(this).removeAttr("disabled");
              alert("please complete all fields and try again.");
            }
          });

          $("form#prep-form button").on("click", function (e) {
            e.preventDefault();
            _this.submit_supporting_form_data();
          });
        },
        validate_form: function validate_form() {
          if ($("#name").val().length < 1) {
            return false;
          }
          if (
            $("#email").val().length < 3 ||
            !$("#email").val().includes("@")
          ) {
            return false;
          }
          if ($("#telephone").val().length < 10) {
            return false;
          }

          return true;
        },
        submit_lead_form_data: function submit_lead_form_data() {
          let payload = {
            method: "submit_form",
            data: {
              name: $("#name").val(),
              email: $("#email").val(),
              telephone: $("#telephone").val(),
              url: window.location.href,
            },
          };
          app.db_req.send(payload, false).then((response) => {
            if (response.success) {
              // alert("SUCCESS....")
              window.location.href = "/thankyou";
            } else {
              alert("An error has occurred, please try again.");
            }
          });
        },
        submit_supporting_form_data: function submit_supporting_form_data() {
          let payload = {
            method: "submit_equiry_data_form",
            data: {
              enquiry_id: $("#enquiry_id").val().length
                ? $("#enquiry_id").val()
                : "empty",
              company: $("#company").val().length
                ? $("#company").val()
                : "empty",
              industry: $("#industry").val().length
                ? $("#industry").val()
                : "empty",
              location: $("#location").val().length
                ? $("#location").val()
                : "empty",
              role: $("#role").val().length ? $("#role").val() : "empty",
              salary: $("#salary").val().length ? $("#salary").val() : "empty",
            },
          };
          app.db_req.send(payload, false).then((response) => {
            if (response.success) {
              $("#company").val("");
              $("#industry").val("");
              $("#location").val("");
              $("#role").val("");
              $("#salary").val("");
              // alert("Thank you, we received your enquiry preperation information.")
              window.location.href = "/details-received";
            } else {
              alert(
                "An error has occured submitting your preperation information, please try again."
              );
            }
          });
        },
      },
      form_alt: {
        lead_id: "",
        init: function init() {
          let _this = this;
          $("form#hero-form-alt button").on("click", function (e) {
            e.preventDefault();
            if ($(this).hasClass("form-next")) {
              if (_this.validate_form()) {
                _this.submit_initial_form_data();
                let next_step = $(".step-current").next();

                $(".next-container").css("display", "none");
                $(".submit-container").css("display", "block");

                $(".step-current").removeClass("step-current");
                next_step.addClass("step-current");
              } else {
                alert("Please complete all fields and try again.");
              }
            } else {
              $(this).attr("disabled", "disabled");
              $(".loader-modal").addClass("show-loader");
              _this.submit_supporting_form_data();
            }
          });
        },
        validate_form: function validate_form() {
          if ($("#name").val().length < 1) {
            return false;
          }
          if (
            $("#email").val().length < 3 ||
            !$("#email").val().includes("@")
          ) {
            return false;
          }
          if ($("#telephone").val().length < 10) {
            return false;
          }
          if ($("#company").val().length < 2) {
            return false;
          }

          return true;
        },
        submit_initial_form_data: function submit_initial_form_data() {
          let _this = this;
          let payload = {
            method: "submit_form",
            data: {
              name: $("#name").val(),
              email: $("#email").val(),
              telephone: $("#telephone").val(),
              url: window.location.href,
            },
          };
          app.db_req.send(payload, false).then((response) => {
            if (response.success) {
              // alert("SUCCESS....")
              // window.location.href= "/thankyou"
              _this.lead_id = response.enq_id;
            } else {
              alert("An error has occurred, please try again.");
            }
          });
        },
        submit_supporting_form_data: function submit_supporting_form_data() {
          let _this = this;
          let payload = {
            method: "submit_equiry_data_form",
            data: {
              enquiry_id: _this.lead_id.length ? _this.lead_id : "empty",
              company: $("#company").val().length
                ? $("#company").val()
                : "empty",
              industry: $("#sector").val().length
                ? $("#sector").val()
                : "empty",
              location: $("#location").val().length
                ? $("#location").val()
                : "empty",
              role: $("#role").val().length ? $("#role").val() : "empty",
              salary: $("#salary").val().length ? $("#salary").val() : "empty",
            },
          };
          app.db_req.send(payload, false).then((response) => {
            if (response.success) {
              $("#company").val("");
              $("#industry").val("");
              $("#location").val("");
              $("#role").val("");
              $("#salary").val("");
              // alert("Thank you, we received your enquiry preperation information.")
              window.location.href = "/employer-thankyou";
            } else {
              alert(
                "An error has occured submitting your preperation information, please try again."
              );
            }
          });
        },
      },
      form_recruit_first: {
        // CURRENTLY IN USE.
        lead_id: "",
        form_data: {
          business: {
            company: "",
            industry: "",
            location: "",
            role: "",
            salary: "",
          },
          lead: {
            name: "",
            email: "",
            telephone: "",
          },
        },
        init: function init() {
          let _this = this;
          $("form#hero-form-rf").validate({
            rules: {
              telephone: {
                required: "Telephone number is required",
                d8val_inttelephone_opt: [
                  { name: "RequiredCountry", value: "GB" },
                ],
              },
            },
          });
          $("form#hero-form-rf button").on("click", function (e) {
            e.preventDefault();
            if ($(this).hasClass("form-next")) {
              if (_this.validate_company_form()) {
                _this.submit_supporting_form_data();
                let next_step = $(".step-current").next();
                $(".next-container").css("display", "none");
                $(".submit-container").css("display", "block");
                $(".step-current").removeClass("step-current");
                next_step.addClass("step-current");
              } else {
                alert("Please complete all fields and try again.");
              }
            } else {
              $(this).attr("disabled", "disabled");
              if (_this.validate_form()) {
                _this.submit_initial_form_data();
                $(".loader-modal").addClass("show-loader");
              } else {
                $(this).removeAttr("disabled");
              }
            }
          });
        },
        validate_form: function validate_form() {
          if ($("#name").val().length < 1) {
            return false;
          }
          if (
            $("#email").val().length < 3 ||
            !$("#email").val().includes("@")
          ) {
            return false;
          }
          if ($("#telephone").val().length < 10) {
            return false;
          }
          if ($("#company").val().length < 2) {
            return false;
          }

          if (
            !$("#email").hasClass("valid") ||
            !$("#telephone").hasClass("valid")
          ) {
            return false;
          }

          return true;
        },
        validate_company_form: function validate_company_form() {
          if ($("#sector").val().length < 1) {
            return false;
          }
          if ($("#role").val().length < 1) {
            return false;
          }
          if ($("#salary").val().length < 1) {
            return false;
          }
          if ($("#location").val().length < 1) {
            return false;
          }

          return true;
        },
        submit_initial_form_data: function submit_initial_form_data() {
          let _this = this;

          (_this.form_data.business.company = $("#company").val().length
            ? $("#company").val()
            : "empty"),
            (_this.form_data.lead.name = $("#name").val()),
            (_this.form_data.lead.email = $("#email").val()),
            (_this.form_data.lead.telephone = $("#telephone").val());
          _this.form_data.lead.url = window.location.href;

          let payload = {
            method: "all_data_form",
            data: _this.form_data,
          };
          console.log("dat: " + JSON.stringify(payload, 2, null));
          app.db_req.send(payload, false).then((response) => {
            console.log("FORM: " + JSON.stringify(response, 2, null));
            if (response.success) {
              // alert("SUCCESS....")
              window.location.href = "/details-received";
              _this.lead_id = response.enq_id;
            } else {
              alert("An error has occurred, please try again.");
            }
          });
        },
        submit_supporting_form_data: function submit_supporting_form_data() {
          let _this = this;
          (_this.form_data.business.industry = $("#sector").val().length
            ? $("#sector").val()
            : "empty"),
            (_this.form_data.business.location = $("#location").val().length
              ? $("#location").val()
              : "empty"),
            (_this.form_data.business.role = $("#role").val().length
              ? $("#role").val()
              : "empty"),
            (_this.form_data.business.salary = $("#salary").val().length
              ? $("#salary").val()
              : "empty");
        },
      },
      full_pageform: {
        lead_id: "",
        form_data: {
          business: {
            company: "",
            industry: "",
            location: "",
            role: "",
            salary: "",
          },
          lead: {
            name: "",
            email: "",
            telephone: "",
          },
        },
        send_form: function send_form() {
          let payload = {
            method: "save_full_page_form",
            data: this.form_data,
            token,
          };

          app.db_req.send(payload, false).then((res) => {
            console.log(res);
            if (res.success) {
              document.location.href = "/details-received";
            } else { 
              alert("Error in the server");
            }
          });
        },
        init: function init() {
          let _this = this;
          $("form#hero-full-pageform").validate({
            rules: {
              telephone: {
                required: "Telephone number is required",
                d8val_inttelephone_opt: [
                  { name: "RequiredCountry", value: "GB" },
                ],
              },
            },
          });
          $(".form-submit").on("click", (e) => {
            let valid;
            let data = $("#hero-full-pageform").serializeArray();
            e.preventDefault();
            data.forEach((e) => {
              if (
                e.name === "name" ||
                e.name === "email" ||
                e.name === "telephone"
              ) {
                _this.form_data.lead[e.name] = e.value;
              } else {
                _this.form_data.business[e.name] = e.value;
              }
            });
            valid = data.every(
              (el) => $(`#${el.name}`).hasClass("valid") && el.value !== ""
            );

            if (valid) {
              _this.send_form();
            } else {
              alert("Please fill all the fields and try again.");
            }
          });
        },
      },
      checkCookie: function checkCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(";");
        for (var i = 0; i < ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == " ") {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
          }
        }
        return "";
      },
      setCookie: function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
      },
      db_req: {
        send: async function send(payload, debug = false) {
          return await fetch("/api/endpoint.php", {
            // PRODUCTION ENDPOINT
            method: "post",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(payload),
          })
            .then((data) => (debug ? data.text() : data.json()))
            .then((data) => {
              if (debug)
                console.log(
                  "DEBUG response: " +
                    payload.method +
                    " : " +
                    JSON.stringify(data, null, 2)
                      .replace(/\\"/g, "")
                      .replace(/<br\s*[\/]?>/gi, " \n ")
                );
              return data;
            })
            .catch((error) => console.log(error));
        },
      },
    };
  });
})(jQuery, this);
