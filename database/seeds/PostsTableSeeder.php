<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medusa = DB::table('festivals')->where('name', 'Medusa Sunbeach Festival')->first()->id;
        $arenal = DB::table('festivals')->where('name', 'Arenal Sound')->first()->id;
        $dreambeach = DB::table('festivals')->where('name', 'Dreambeach Festival')->first()->id;
        $awakenings = DB::table('festivals')->where('name', 'Awakenings')->first()->id;
        $sstory = DB::table('festivals')->where('name', 'A Summer Story')->first()->id;
        $aquasella = DB::table('festivals')->where('name', 'Aquasella')->first()->id;
        $wan = DB::table('festivals')->where('name', 'Wan Festival')->first()->id;
        $tomorrow = DB::table('festivals')->where('name', 'Tomorrowland')->first()->id;
        $umf = DB::table('festivals')->where('name', 'Ultra Music Festival')->first()->id;
        $jaco = DB::table('festivals')->where('name', 'The Jaco Festival')->first()->id;

        DB::table('posts')->delete();
        DB::table('posts')->insert(
            [
                ['title' => 'Récord de venta entradas',
                    'lead' => 'Medusa Sunbeach rompe todos los récords al vender 75.000 entradas para 2017 en un mes ',
                    'body' => 'Los primeros compases de la venta de entradas online para Medusa Sunbeach Festival 2017 se han saldado con un asombroso récord. En menos de un mes, el festival valenciano ha vendido un total de 75.000 tickets, y eso que todavía no ha anunciado a ningún artista para su próxima edición. Estas cifras vuelven a poner de manifiesto el fenómeno social en que se ha convertido el evento para los jóvenes y amantes de la música electrónica de toda España, firmemente consolidado tras la exitosa edición del pasado agosto, con 145.000 asistentes. Las 75.000 entradas de día que Medusa ya ha vendido equivalen a 25.000 abonos de tres días. Como es sabido, la cuarta edición del festival se celebrará entre el 9 y 15 de agosto en la Playa de Cullera (Valencia). La organización está abordando en estas fechas la configuración de un cartel “de talla mundial”, han indicado, y está a punto de cerrar la contratación de varios artistas del Top 100 de DJ Mag, que se anunciarán próximamente. Paralelamente, el equipo creativo del festival trabaja en el diseño del escenario principal, cuya decoración girará en torno a la temática Jungle Carnival, una fantasía sobre la selva y la vida salvaje. “Los primeros bocetos que estamos manejando son una locura. El público va a alucinar”, han adelantado.
                    Novedades en Navidad
                    Entre las pocas novedades que sí se han dado ya a conocer figura la incorporación de dos nuevos estilos. En 2017, dos subgéneros de la música electrónica con muchos adeptos, como el Trance y el Hardstyle, tendrán su hueco en el evento por primera vez. En total, Medusa habilitará 10 áreas musicales, aumentando así su diversidad sonora para responder a la demanda de todo tipo de gustos. En 2016, los géneros presentes en Cullera fueron seis: EDM, Techno, Dubstep/Trap, Indie Pop-Rock, Remember y Hard Techno. Con vistas a esta próxima Navidad, Medusa Sunbeach prepara dos lanzamientos. Por un lado, estrenará su esperado aftermovie, un espectacular resumen visual en vídeo de la última edición. Y, además, pondrá a la venta una nueva edición limitada de abonos. Para evitar que miles de fans del festival se queden sin sus tickets, en breve abrirá un periodo de pre-registro a través de su web, garantizando así que todos los inscritos podrán adquirir su abono.',
                    'festival_id' => $medusa,
                    'permalink' => 'record-de-venta-entradas'
                ],

                ['title' => 'Martin Garrix estrena el cartel del Arenal Sound 2017',
                    'lead' => 'El considerado DJ número 1 del mundo es la primera gran confirmación del festival ',
                    'body' => 'El Arenal Sound ya tiene su primer gran protagonista para el cartel del próximo año: Martin Garrix. La organización de la octava edición que tendrá lugar del 1 al 6 de agosto en Burriana, Castellón, ha hecho pública esta primera confirmación. El holandés es el DJ número 1 del mundo para la prestigiosa revista DJ Mag, que el pasado octubre publicó su encuesta anual y lo llevó a lo más alto de esta clasificación tras tres años de éxito absoluto.
                    Martin Garrix se convierte en el más joven en alcanzar este reconocimiento y ahora ha sido elegido por el Arenal para inaugurar su próximo cartel. El festival al que han asistido más de 300.000 festivaleros en 2016 y que en los próximos días anunciará más nombres ha puesto sus entradas a la venta desde 35 euros más gastos. Un evento que dura seis días y que se ha convertido en un referente musical del verano.',
                    'festival_id' => $arenal,
                    'permalink' => 'martin-garrix-estrena-el-cartel-del-arenal-sound-2017'
                ],

                ['title' => 'Gran éxito de asistencia de Dreambeach',
                    'lead' => 'Dreambeach cierra su edición mas multitudinaria con 160.000 asistentes ',
                    'body' => 'La cita electrónica del verano aumenta en un 15% las cifras de su pasada entrega y deja un impacto económico de seis millones de euros.
                    Dreambeach cierra aquí su edición mas multitudinaria con 160.000 asistentes durante las cuatro jornadas. 52.000 y 53.000 asistentes visitaban el recinto el viernes 12 y sábado 13 de agosto, mientras que 35.000 inauguraban el nuevo espacio de Dreambeach en la fiesta de bienvenida del jueves “Welcome Villaricos”, celebrada por primera vez ya en el recinto. La fiesta de clausura Elrow goes to Dreambeach se ha cerrado anoche con una asistencia aproximada de 20.000 personas. Un récord absoluto de asistencia con Sold Out en la zona de acampada con 30.000 dreamers alojados desde el pasado miércoles. La ocupación hotelera en la zona ha sido del 100%. Dreambeachcalcula un impacto económico local de alrededor de 6 millones de €.',
                    'festival_id' => $dreambeach,
                    'permalink' => 'gran-exito-de-asistencia-de-dreambeach'
                ],

                ['title' => 'Un 10 para Awakenings Festival',
                    'lead' => 'Hace poco mas de una semana estuvimos en Awakenings Festival y os contamos que tal nos fue en el mejor festival de techno del mundo ',
                    'body' => 'Amsterdam nos recibió con un clima primaveral, perfecto para visitar sus canales unos días antes de que comenzará lo que para nosotros fue una experiencia increíble, en el mejor festival de techno del mundo.
                    Llegó el sábado y nos pusimos camino a la estación de Sloterdijk (estación en la que este redactor jura haberse cruzado con Marcel Dettmann), lugar desde donde la organización de Awakenings tenía designado como punto de partida para los autobuses habilitados para llegar al festival, donde ya se respiraba un ambiente de fiesta y donde pudimos ver muchas banderas españolas. Después de tomarnos unos refrescos y conversar con algunos compatriotas, en menos de 1 minuto ya estábamos montados en uno de esos muchos y bien organizados autobuses que la organización de Awakenings tenía habilitados para llegar con facilidad a Spaarnwoude.',
                    'festival_id' => $awakenings,
                    'permalink' => 'un-10-para-awakenings-festival'
                ],

                ['title' => 'A Summer Story confirma a Armin van Buuren',
                    'lead' => 'Armin Van Buuren se suma al festival madrileño de electrónica A Summer Story ',
                    'body' => 'El reputado DJ y productor holandés de música electrónica Armin Van Buuren formará parte del cartel del festival A Summer Story, que se celebrará los días 23 y 24 de junio en la Ciudad del Rock de la localidad madrileña de Arganda del Rey.
                    Además de él, las promotoras responsables del evento han informado hoy en nota de prensa que también contarán en su programación con las sesiones de DJ Nano, Donkey Rollers, Joris Voorn, Pan-Pot, Shake Coconut, Speedy J, The Beast Project y Third Party.
                    A Summer Story llegará con ellos a su tercera edición, para la que ya se había anunciado previamente la participación de otras figuras de la música electrónica, como Aly & Fila, Angerfist, Dimitri Vangelis & Wyman, Eric Prydz, Minus Militia, Óscar Mulero y Tom Staar & Kryder.
                    El festival, para el que según sus datos ya se han despachado 8.000 abonos, se garantiza con esta alineación la inclusión de EDM, sonidos “trance” y “progressive”, pero también “techno”, “house” y “hard”. El próximo cupo de 4.000 abonos saldrá a la venta el día 22 al precio de 40 euros en los canales oficiales.',
                    'festival_id' => $sstory,
                    'permalink' => 'a-summer-story-confirma-a-armin-van-buuren'
                ],

                ['title' => 'Primeros nombres confirmados para el Aquasella 2017',
                    'lead' => 'Y no son nombres cualquiera ',
                    'body' => 'Adam Beyer, H.O.S.H., Len Faki, No.Dolls, Oscar Mulero y Solomun nos deleitarán del 20 al 23 de julio de uno de nuestros festivales favoritos: Aquasella. 
                    Ya tenemos aquí los primeros nombres del Aquasella 2017. Y de nuevo, el festival asturiano no nos ha decepcionado. Si estos son los primeros nombres, no nos queremos imaginar que ases se están guardando bajo la manga nuestros amigos de Aquasella. Adam Beyer, H.O.S.H., Len Faki, No.Dolls, Oscar Mulero y Solomun. No está nada mal, ¿verdad?
                    Para empezar, tener a estos artistas demuestra que Aquasella renueva su compromiso con el sonido underground. Pese a los cantos de sirena para diversificar los estilos musicales, los responsables del festival se mantienen fieles a sus orígenes, apostando desde siempre por las diversas ramas del techno. ¿Quién entendería un Aquasella sin Pepo? Pues nadie.
                    Aquasella es un festival que lleva unos años disfrutando de su mayoría de edad, y que no para de crear adeptos. La belleza del paisaje asturiano, la sidra, el Cantábrico, la energía especial de Ribadesella y sus alrededores… Todo ello hace de Aquasella el festival de referencia del norte de España.',
                    'festival_id' => $aquasella,
                    'permalink' => 'primeros-nombres-confirmados-para-el-aquasella-2017'
                ],

                ['title' => 'WAN FESTIVAL: 2017 EMPIEZA CON MUSICÓN EN MADRID',
                    'lead' => 'Wan Festival cumplió con las expectativas y deja un público satisfecho con el resultado ',
                    'body' => 'Entramos al festival a las 8.30 pm -la apertura de puertas era a las 7 pm pero finalmente se realizó a las 8 pm– y ya sabemos como es esto, se formó una gran aglomeración a la entrada, pero fue bien y rapidamente subsanada con el control de los servicios de seguridad privados. Los cacheos en la puerta eran meticulosos, a mi parecer más, hasta más exhaustivos que algunos de la Policía Nacional. La presencia de la Policía Nacional con fuerzas caninas en los accesos y Policía Municipal de Leganés, aseguraban que no se pasase ningún objeto peligroso al evento. Gran actuación teniendo en cuenta que nuestro país todavía se encuentra en nivel 4 de alerta terrorista. Pese a ello, algunos individuos -vamos a llamarles: ‘cafres’- tiraron en el desarrollo del festival y con el recinto totalmente lleno, dos botes de algún tipo de gas que hizo que a la gente le empezaran a llorar los ojos e incluso llegó a irritarles las gargantas. Entre ellos nosotros, quienes estábamos allí presentes en el momento. Fueron arrojados en dos partes de la pista, con lo que se crearon dos enormes agujeros en una tarima que estaba a rebosar. Afortunadamente, el público fue civilizado y los servicios de seguridad estuvieron rápidos para controlar la situación y que no cundiese el pánico. Esperamos que estos ‘cafres’ hayan sido atrapados y paguen por sus actos de una manera severa, puesto que hoy podríamos haber estado hablando de una tragedia.
                    En el aspecto musical, entramos con la sesión avanzada de Fabio Florido, todavía en pleno proceso de entrada del público y con un excelente warm up de lo que vendría a posteriori. En nuestra opinión, Luciano un aprobado alto con un 7, ha Richie Hawtin le otorgamos un 7, notable para el canadiense. Marco Carola y Paco Osuna un 6, Gonçalo un 5 y los Martinez Brother un 6.
                    Luciano, el chileno supo conectar rápidamente con el público y empezó a caldear la pista de baile, vibrante y con mucho ritmo empezó a poner color a Wan Festival.
                    Richie Hawtin, después de las grandes últimas sesiones que le hemos visto protagonizar, tanto en Off Week o Sonar, no estuvo igual. Optó por una música más bailonga, pero teniendo en cuenta a los acompañantes del line-up era lo lógico y normal y más aún si analizamos la paliza de kilómetros que se metió entre pecho y espalda (como siempre) en año nuevo.
                    Marco Carola y Paco Osuna con sus ritmos, dos sesiones similares. Tenías que mirar al escenario y ver quien pinchaba para poder  diferenciar quien estaba en cabina.
                    De Gonçalo, después de la gran sesión que nos ofreció en WAN festival el año pasado, nos esperábamos mucho más de él . Los Martinez Brother en su línea, sabiendo como hacer disfrutar siempre al público.',
                    'festival_id' => $wan,
                    'permalink' => 'wan-festival-2017-empieza-con-musicon-en-madrid'
                ],

                ['title' => 'Tomorrowland: qué hay detrás del festival más asombroso del mundo',
                    'lead' => ' Las entradas se agotan en minutos. Millones de jóvenes sueñan con ir o lo siguen por internet.',
                    'body' => 'Más allá de la tierra del mañana, no existe nada; más allá de Tomorrowland, no cabe nada. Han pasado más de 10 años desde que por primera vez, en 2005, el festival más grande del mundo abría sus puertas en Boom, Bélgica, para todos los fans de la música electrónica. Más allá de ser una experiencia que se debería vivir por lo menos una vez en la vida, la cita se ha convertido en todo un fenómeno mundial sin precedentes para demostrar lo que es, y lo que será en el futuro. 
                    Tomorrowland pretendía ser algo más que música, lo que buscaba era crear magia. Esa magia, que te hace olvidar el pasado, vivir el presente, y demostrar que el mañana es todo un misterio. Tras haber celebrado una década de vida, cada año promete ser mejor, y extender sus fronteras a otros continentes: este año, «TomorrowWorld», en Atlanta, en septiembre, y en Sao Paulo, con el «Tomorrowland Brasil», el pasado mes de abril.
                    Se calcula que este año, entre los días 24, 25 y 26 de julio, la localidad de Boom volverá a reunir a más de 190.000 personas de todas partes del mundo: India, Australia, Rusia, Alemania, Chile, Canadá, España, Corea del Sur, y así, hasta 75 nacionalidades diferentes. A pesar del desorbitado precio de las entradas, entre 400 y más de 900 euros por día, se agotaron una vez más en cuestión de minutos. Todo ello, para que los más afortunados puedan disfrutar de artistas como Avicii, David Guetta, Dimitri Vegas, Martin Garrix, Steve Aoki, Skrillex, entre otros muchos mñusicos y dj’s internacionales de renombre, que actuarán en 15 escenarios diferentes, y cuyo decorado desprenderá magia en estado puro, incluso más que los propios artistas.',
                    'festival_id' => $tomorrow,
                    'permalink' => 'tomorrowland-que-hay-detras-del-festival-mas-asombroso-del-mundo'
                ],

                ['title' => 'Hardwell emitirá su set del UMF Miami 2017 en directo en 360º',
                    'lead' => 'Por primera vez en su historia, Ultra Music Festival emitirá uno de sus sets en directo en 360º ',
                    'body' => 'Desde el ya habitual Live Streaming que todos los años ofrece el festival de Miami, podremos disfrutar de la actuación de Hardwell en un formato hasta ahora nunca visto en ninguno de los grandes festivales del circuito internacional. No es la primera vez que Hardwell hace algo así en Miami, pues durante la Miami Music Week del pasado año 2016 realizó una retransmisión en directo también en formato 360º.
                    La actuación del holandés será este domingo 26 de marzo; suponemos que se emitirá el set completo, o al menos gran parte de él, pero no sabemos aún cuales son los planes de Ultra Music Festival y su organización de cara a los horarios de retransmisión del domingo, así que tocará esperar al mismo día para conocer la información respecto a esto, aunque ya sabemos que su actuación es de 23:45h a 00:45h. Se prevé que actúe ante unas 160.000 personas aproximadamente, más los cientos de miles de usuarios que año tras años siguen la retransmisión del festival desde el streaming en directo en YouTube.',
                    'festival_id' => $umf,
                    'permalink' => 'hardwell-emitira-su-set-del-umf-miami-2017-en-directo-en-360o'
                ],

                ['title' => 'THE JACO FESTIVAL: SE LÍA EN ALICANTE',
                    'lead' => 'The Jaco Festival promete en su primera edición',
                    'body' => 'Ha nacido un nuevo festival de techno en Alicante que augura un gran éxito debido al nivel de su cartel con artistas como Joris Voorn, Paco Osuna, Richie Hawtin y Carl Cox, entre otros. Todavía no se ha abierto la venta de entradas y ya toda la provincia de Alicante, el resto de España e incluso parte de Europa siguen atentos las próximas noticias de este súper festival, organizado por un grupo de jóvenes pero expertos en la industria del techno. El evento dará comienzo el 25 de agosto, pero no se sabe cuando acabará porque según palabras textuales del fundador: "El final del festival dependerá del nivel de jaco del público, que esperamos que sea máximo", así que este festival puede durar tres días, una semana o incluso puede batir récords y convertirse en el festival más largo de la historia. 
                    En cuanto a los requisitos necesarios para garantizar la entrada a la zona del festival se informa de que se prohibe la entrada a menores de 18 años, quedará limitada la entrada o permanencia en el recinto a todo aquel que porte armas u objetos contundentes, cortantes o potencialmente peligrosos susceptible de causar daño a personas y objetos. Por último, pero no por ello menos importante, se requiere ir de jaco para poder entrar a la zona del evento y así poder disfrutar de la mayor experiencia que ofrece este Jaco Festival, es decir, se prohibirá la entrada al evento a cualquier persona que se le detecte algún indicio de que no va de jaco.',
                    'festival_id' => $jaco,
                    'permalink' => 'the-jaco-festival-se-lia-en-alicante'
                ]

            ]
        );

       // factory(\App\Post::class, 300)->create();
    }
}
