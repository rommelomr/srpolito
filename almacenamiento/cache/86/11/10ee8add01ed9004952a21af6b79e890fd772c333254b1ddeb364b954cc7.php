<?php

/* index.twig.html */
class __TwigTemplate_861110ee8add01ed9004952a21af6b79e890fd772c333254b1ddeb364b954cc7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<?php echo 'HOLA'; Funciones::verificarLogin(); ?>
<title>Principal</title>
</head>

<body>
\t<div class=\"container-fluid\">
\t\t
\t\t<form method=\"post\">
\t\t<?php
\t\t\t\$bot=null;
\t\t\t\$permiso=Funciones::PGSC('tipo');

\t\t\tif(\$permiso[0]=='1'){
\t\t\t\t
\t\t\t\t//\$bot[0]=Crear::botonDropdown('Usuarios,login,usuarios');
\t\t\t\t\$bot[0]=['Usuarios','login','usuarios'];
\t\t\t\t
\t\t\t\t
\t\t\t}
\t\t\tCrear::navbar([Crear::dropdownNavBarSave(\$bot)]);
\t\t?>
\t\t</form>
\t
\t</div>
</body>
</html>

";
    }

    public function getTemplateName()
    {
        return "index.twig.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
