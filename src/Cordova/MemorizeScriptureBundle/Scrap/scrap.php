<?php
//include ('simplehtmldom/simple_html_dom.php');

//$html = file_get_html('http://quod.lib.umich.edu/k/kjv/browse.html');
//$html = file_get_html('http://quod.lib.umich.edu/cgi/k/kjv/kjv-idx?type=DIV1&byte=1477');

// convert html into a string to be used for the preg_match
//$str = $html->save();
//$str = $html->save();
//print_r($str);
/*$h3_titles = $html->find('h3');
foreach ($h3_titles as $item) {
	
}*/
/*$currentone = preg_quote("Gen.1");
$nextone = preg_quote("Gen.2");
$pattern = '|<h3>'.$currentone.'</h3>(.*)<h3>'.$nextone.'</h3>|ims';
echo "this is the search pattern = ".$pattern;
$str = "<h2>Genesis</h2><hr><h3>Gen.1</h3>[<b>1</b>] In the beginning God created the heaven and the earth.<br>[<b>2</b>] And the earth was without form, and void; and darkness was upon the face of the deep. And the Spirit of God moved upon the face of the waters.<br>[<b>3</b>] And God said, Let there be light: and there was light.<br>[<b>4</b>] And God saw the light, that it was good: and God divided the light from the darkness.<br>[<b>5</b>] And God called the light Day, and the darkness he called Night. And the evening and the morning were the first day.<br>[<b>6</b>] And God said, Let there be a firmament in the midst of the waters, and let it divide the waters from the waters.<br>[<b>7</b>] And God made the firmament, and divided the waters which were under the firmament from the waters which were above the firmament: and it was so.<br>[<b>8</b>] And God called the firmament Heaven. And the evening and the morning were the second day.<br>[<b>9</b>] And God said, Let the waters under the heaven be gathered together unto one place, and let the dry land appear: and it was so.<br>[<b>10</b>] And God called the dry land Earth; and the gathering together of the waters called he Seas: and God saw that it was good.<br>[<b>11</b>] And God said, Let the earth bring forth grass, the herb yielding seed, and the fruit tree yielding fruit after his kind, whose seed is in itself, upon the earth: and it was so.<br>[<b>12</b>] And the earth brought forth grass, and herb yielding seed after his kind, and the tree yielding fruit, whose seed was in itself, after his kind: and God saw that it was good.<br>[<b>13</b>] And the evening and the morning were the third day.<br>[<b>14</b>] And God said, Let there be lights in the firmament of the heaven to divide the day from the night; and let them be for signs, and for seasons, and for days, and years:<br>[<b>15</b>] And let them be for lights in the firmament of the heaven to give light upon the earth: and it was so.<br>[<b>16</b>] And God made two great lights; the greater light to rule the day, and the lesser light to rule the night: he made the stars also.<br>[<b>17</b>] And God set them in the firmament of the heaven to give light upon the earth,<br>[<b>18</b>] And to rule over the day and over the night, and to divide the light from the darkness: and God saw that it was good.<br>[<b>19</b>] And the evening and the morning were the fourth day.<br>[<b>20</b>] And God said, Let the waters bring forth abundantly the moving creature that hath life, and fowl that may fly above the earth in the open firmament of heaven.<br>[<b>21</b>] And God created great whales, and every living creature that moveth, which the waters brought forth abundantly, after their kind, and every winged fowl after his kind: and God saw that it was good.<br>[<b>22</b>] And God blessed them, saying, Be fruitful, and multiply, and fill the waters in the seas, and let fowl multiply in the earth.<br>[<b>23</b>] And the evening and the morning were the fifth day.<br>[<b>24</b>] And God said, Let the earth bring forth the living creature after his kind, cattle, and creeping thing, and beast of the earth after his kind: and it was so.<br>[<b>25</b>] And God made the beast of the earth after his kind, and cattle after their kind, and every thing that creepeth upon the earth after his kind: and God saw that it was good.<br>[<b>26</b>] And God said, Let us make man in our image, after our likeness: and let them have dominion over the fish of the sea, and over the fowl of the air, and over the cattle, and over all the earth, and over every creeping thing that creepeth upon the earth.<br>[<b>27</b>] So God created man in his own image, in the image of God created he him; male and female created he them.<br>[<b>28</b>] And God blessed them, and God said unto them, Be fruitful, and multiply, and replenish the earth, and subdue it: and have dominion over the fish of the sea, and over the fowl of the air, and over every living thing that moveth upon the earth.<br>[<b>29</b>] And God said, Behold, I have given you every herb bearing seed, which is upon the face of all the earth, and every tree, in the which is the fruit of a tree yielding seed; to you it shall be for meat.<br>[<b>30</b>] And to every beast of the earth, and to every fowl of the air, and to every thing that creepeth upon the earth, wherein there is life, I have given every green herb for meat: and it was so.<br>[<b>31</b>] And God saw every thing that he had made, and, behold, it was very good. And the evening and the morning were the sixth day.<br><hr><h3>Gen.2</h3>[<b>1</b>] Thus the heavens and the earth were finished, and all the host of them.<br>[<b>2</b>] And on the seventh day God ended his work which he had made; and he rested on the seventh day from all his work which he had made.<br>[<b>3</b>] And God blessed the seventh day, and sanctified it: because that in it he had rested from all his work which God created and made.<br>[<b>4</b>]";
preg_match($pattern, $str, $matches);
*/
//print_r($str);
//print_r($matches);

//echo $element->innertext.'<br/>';

//echo $html->save();


function processFile($file)
{
        $file = file_get_contents($file);

        $book = array();

        list($junk, $cont) = explode('<hr>', $file, 2);

        $cont = trim($cont);

        preg_match('/<h2>(.*)<\/h2>/U', $cont, $matches);

        $book['title'] = $matches[1];
        $book['chapters'] = array();

        preg_match_all('/<h3>(.*)<\/h3>/U', $cont, $matches);

        foreach($matches[0] as $idx => $chapter_name)
        {
                $chapter = array();

                $chapter['name'] = 'Chapter '.($idx + 1);
                $chapter['verses'] = array();

                // get chapter text

                $begin_pos = strpos($cont, $chapter_name);
                if (isset($matches[0][($idx + 1)]))
                {
                        $end_pos = strpos($cont, $matches[0][($idx + 1)]);
                        $chapter_text = substr($cont, $begin_pos, $end_pos);
                } else {
                        $end_pos = null;
                        $chapter_text = substr($cont, $begin_pos);
                }
                list($text, $junk) = explode('<hr>', $chapter_text);
                $lines = explode('<br>', $text);
                foreach($lines as $line)
                {
                        $l = trim($line);
                        if (strpos($l, ']') === false)
                        {
                                continue;
                        }
                        list($junk, $verse) = explode(']', trim($line));
                        $chapter['verses'][] = $verse;
                }
                $book['chapters'][] = $chapter;
        }
        return $book;
}

/*
	$info = processFile('http://quod.lib.umich.edu/cgi/k/kjv/kjv-idx?type=DIV1&byte=1477');
	$info_chapternum = sizeof($info['chapters']);
	print_r($info_chapternum);
*/

?>
