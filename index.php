<?php
function minifyCss($css) {
    $css = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $css);
    $css = preg_replace('/\s{2,}/', ' ', $css);
    $css = preg_replace('/\s*([:;{}])\s*/', '$1', $css);
    $css = preg_replace('/;}/', '}', $css);
    return $css;
}

function generateHtmlCss($text) {
    $commonStyles = '.alphabet {
        float: left;
        display: block;
        margin-left: 10px;
        margin-top: 10px;
        height: 30px;
        width: 30px;
        overflow: hidden;
        box-sizing: border-box;
        margin: 5px auto;
    }';

    $cssStyles = array(
        'A' => '.A {
			  border-style: solid;
			  border-width: 2px 2px 0px 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 50% 50% 20% 20%;
			  margin-right: 5px;
			}
			.A:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  height: 50%;
			  border-style: solid;
			  border-width: 0 0 2px 0;
			  border-color: rgba(99, 41, 147, 0.5);
		}',

    'B' => '.B {
			  border-style: solid;
			  border-width: 0 0 0 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  margin-right: 5px;
			}
			.B:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  height: 50%;
			  border-style: solid;
			  border-width: 2px 2px 1.5px 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0 50% 50% 0;
			}
			.B:after {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  height: 50%;
			  border-style: solid;
			  border-width: 1.5px 2px 2px 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0 50% 50% 0;
		}',

    'C' => '.C {
			  border-style: solid;
			  border-width: 2px 0 2px 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 60% 30% 30% 60%;
			  margin-right: 5px;
			}',

				'D' => '.D {
			  border-style: solid;
			  border-width: 2px 2px 2px 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0% 50% 50% 0%;
		}',

	'D' => '.D {
			  border-style: solid;
			  border-width: 2px 2px 2px 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0% 50% 50% 0%;
			  margin-right: 5px;
		}',

    'E' => '.E {
			  border-style: solid;
			  border-width: 2px 0 2px 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0% 10% 10% 0%;
			  position: relative;
			  margin-right: 5px;
			}
			.E:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  height: 0%;
			  width: 80%;
			  position: absolute;
			  border-style: solid;
			  border-width: 2px 0px 0 0px;
			  border-color: rgba(99, 41, 147, 0.5);
			  top: 50%;
		}',

    'F' => '.F {
			  border-style: solid;
			  border-width: 2px 0 0 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-bottom-color: transparent;
			  border-radius: 0% 10% 0% 0%;
			  position: relative;
			  margin-right: 5px;
			}
			.F:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  height: 0;
			  width: 80%;
			  position: absolute;
			  border-style: solid;
			  border-width: 0px 0px 2px 0px;
			  border-color: rgba(99, 41, 147, 0.5);
			  top: 40%;
		}',

    'G' => '.G {
			  border-style: solid;
			  border-width: 2px 0 2px 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 50% 10% 0% 50%;
			  position: relative;
			  margin-right: 5px;
			}
			.G:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  height: 50%;
			  width: 60%;
			  border-style: solid;
			  border-width: 2px 2px 0px 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  position: absolute;
			  bottom: 0;
			  right: 0;
			  border-radius: 50% 10% 0% 0%;
		}',

    'H' => '.H {
			  border-style: solid;
			  border-width: 0 2px 0 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 20% 20% 20% 20%;
			  position: relative;
			  margin-right: 5px;
			}
			.H:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  position: absolute;
			  height: 0;
			  border-style: solid;
			  border-width: 0px 0px 2px 0px;
			  border-color: rgba(99, 41, 147, 0.5);
			  top: 50%;
		}',

    'I' => '.I {
			  width: 25px;
			  border-style: solid;
			  border-width: 2px 0 2px 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 10% 10% 10% 10%;
			  position: relative;
			  margin-right: 5px;
			}
			.I:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  width: 0;
			  border-style: solid;
			  border-width: 0 2px 0 0px;
			  border-color: rgba(99, 41, 147, 0.5);
			  position: absolute;
			  top: 0;
			  bottom: 0;
			  left: 50%;
			  margin-left: -2.5px;
		}',

    'J' => '.J {
			  border-style: solid;
			  border-width: 2px 0 0 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 10% 10% 0% 0%;
			  position: relative;
			  margin-right: 5px;
			}
			.J:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  width: 50%;
			  border-style: solid;
			  border-width: 0 2px 2px 0px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0% 0% 50% 50%;
			  position: absolute;
			  top: 0;
			  bottom: 0;
			  right: 45%;
		}',

    'K' => '.K {
			  border-style: solid;
			  border-width: 0 0 0 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0% 0% 0% 0%;
			  overflow: hidden;
			  margin-right: 5px;
			}
			.K:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  height: 50%;
			  border-style: solid;
			  border-width: 0 2px 2px 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0 0 100% 0%;
			}
			.K:after {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  height: 50%;
			  border-style: solid;
			  border-width: 2px 2px 0 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0 100% 0% 0%;
		}',

    'L' => '.L {
			  border-style: solid;
			  border-width: 0 0 2px 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 20% 0% 20% 20%;
			  margin-right: 5px;
		}',

    'M' => '.M {
			  border-style: solid;
			  border-width: 0 2px 0px 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 20% 20% 20% 20%;
			  overflow: hidden;
			  margin-right: 5px;
			}
			.M:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  height: 50%;
			  border-style: solid;
			  border-width: 0 2px 2px 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0% 0% 50% 50%;
		}',

    'N' => '.N {
			  border-style: solid;
			  border-width: 0 0 0px 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 20% 20% 20% 20%;
			  position: relative;
			  margin-right: 5px;
			}
			.N:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  border-style: solid;
			  border-width: 0 2px 2px 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0 0 0% 100%;
			  position: relative;
		}',

    'O' => '.O {
			  border-style: solid;
			  border-width: 2px 2px 2px 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 45% 45% 45% 45%;
			  position: relative;
			  margin-right: 5px;
		}',

    'P' => '.P {
			  border-style: solid;
			  border-width: 0 0 0 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0 25% 0% 25%;
			  margin-right: 5px;
			}
			.P:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  border-style: solid;
			  border-width: 2px 2px 2px 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  height: 40%;
			  border-radius: 0 45% 45% 45%;
		}',

    'Q' => '.Q {
			  border-style: solid;
			  border-width: 2px 2px 2px 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 45% 45% 45% 45%;
			  overflow: visible;
			  position: relative;
			  margin-right: 5px;
			}
			.Q:after {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  position: absolute;
			  border-style: solid;
			  border-width: 2px 2px 0 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  height: 0%;
			  left: 50%;
			  top: 80%;
			  border-radius: 45% 45% 45% 45%;
		}',

		'R' => '.R {
			  border-style: solid;
			  border-width: 0 0 0 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0 0% 0% 25%;
			  position: relative;
			  margin-right: 5px;
			}
			.R:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  border-style: solid;
			  border-width: 2px 2px 0 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  height: 40%;
			  border-radius: 0 45% 45% 0%;
			}
			.R:after {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  border-style: solid;
			  border-width: 2px 2px 0 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  height: 60%;
			  border-radius: 15% 45% 15% 0%;
		}',

		'S' => '.S {
			  border-style: solid;
			  border-width: 0 0 0 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  overflow: hidden;
			  margin-right: 5px;
			}
			.S:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  height: 50%;
			  border-style: solid;
			  border-width: 2px 0 1.5px 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 50% 0% 0% 0%;
			}
			.S:after {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  height: 50%;
			  border-style: solid;
			  border-width: 1.5px 2px 2px 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0% 0% 50% 0%;
		}',
		'T' => '.T {
			  border-style: solid;
			  border-width: 2px 0 0 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 10% 10% 0% 0%;
			  position: relative;
			  margin-right: 5px;
			}
			.T:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  width: 0;
			  border-style: solid;
			  border-width: 0 2px 0 0px;
			  border-color: rgba(99, 41, 147, 0.5);
			  position: absolute;
			  top: 0;
			  bottom: 0;
			  left: 50%;
			  margin-left: -2.5px;
		}',
		'U' => '.U {
			  border-style: solid;
			  border-width: 0 2px 2px 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0 0 45% 45%;
			  margin-right: 5px;
		}',
		'V' => '.V {
			  border-style: solid;
			  border-width: 0 2px 2px 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0 0 100% 0%;
			  margin-right: 5px;
		}',
		'W' => '.W {
			  border-style: solid;
			  border-width: 0 2px 0 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  transform: perspective(50px) rotatex(-10deg);
			  position: relative;
			  overflow: hidden;
			  margin-right: 5px;
			}
			.W:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  height: 50%;
			  border-style: solid;
			  border-width: 2px 2px 0 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 50% 50% 0% 0%;
			  position: absolute;
			  top: 50%;
		}',
		'X' => '.X {
			  border-style: solid;
			  border-width: 2px 0 0 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  position: relative;
			  overflow: hidden;
			  clip-path: polygon(10% 0%, 0% 10%, 40% 50%, 0% 90%, 10% 100%, 50% 60%, 90% 100%, 100% 90%, 60% 50%, 100% 10%, 90% 0%, 50% 40%);
			  background: radial-gradient(circle at 0% 100%, rgba(99, 41, 147, 0.9), rgba(149, 41, 107, 0.6), rgba(9, 141, 147, 0.9), rgba(49, 11, 147, 0.2));
			  margin-right: 5px;
		}',
		'Y' => '.Y {
			  border-style: solid;
			  border-width: 0 0 0 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  margin-right: 5px;
			}
			.Y:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  height: 50%;
			  border-style: solid;
			  border-width: 0 2px 2px 2px;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0 0% 50% 50%;
			}
			.Y:after {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  width: 50%;
			  height: 50%;
			  border-style: solid;
			  border-width: 0 2px 0 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  margin-left: 2.5px;
		}',
		'Z' => '.Z {
			  border-style: solid;
			  border-width: 2px 0 2px 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  overflow: hidden;
			  border-radius: 0% 0% 10% 0%;
			  margin-right: 5px;
			}
			.Z:before {
			  content: "";
			  display: block;
			  width: 100%;
			  height: 100%;
			  line-height: 0;
			  box-sizing: border-box;
			  border-style: solid;
			  border-width: 0 2px 2px 0;
			  border-color: rgba(99, 41, 147, 0.5);
			  border-radius: 0 0 150% 0%;
		}',

        ' ' => '.space {
            width: 50px;
            height: 50px;
            margin-right: 5px;
        }',

        '.' => '.dot {
            float: left;
            display: block;
            margin-left: 10px;
            margin-top: 10px;
            height: 50px;
            width: 50px;
            overflow: hidden;
            box-sizing: border-box;
            margin: 5px auto;
        }',
    );

    $output = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Generator</title>
    <style>' . $commonStyles;
    $addedStyles = array();
    $characters = str_split(strtoupper($text));
    foreach ($characters as $char) {
        if (isset($cssStyles[$char]) && !in_array($char, $addedStyles)) {
            $output .= $cssStyles[$char];
            $addedStyles[] = $char;
        } elseif (!in_array(' ', $addedStyles)) {
            $output .= $cssStyles[' '];
            $addedStyles[] = ' ';
        }
    }
    $output .= '</style>
</head>
<body>';
    foreach ($characters as $char) {
        if (isset($cssStyles[$char])) {
            $output .= '<div class="alphabet ' . str_replace(".", "dot", $char) . '"></div>';
        } else {
            $output .= '<div class="alphabet space"></div>';
        }
    }
    $output .= '</body>
</html>';
	$output = minifyCss($output);
    return $output;
}

$text = "After the death of his French wife, Ward tries to pick up the pieces back home in Holland. He hires Romanian worker Doru to reconstruct his house, but when Doru suddenly disappears, Ward is left with Doru's nine year old son Mihai. When Ward travels to Romania in search for Mihai's mother, he has to reconcile himself with his past and his future.";
$htmlCss = generateHtmlCss($text);

echo $htmlCss;
?>
