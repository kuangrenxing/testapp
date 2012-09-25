<?php
function getResult($count,$left,$right)
{
	//$count为0
	if($count == 0)
	{
		$assess='直率，与人为善，埋头苦干，脚踏实地，不善于耍花样。运气中。爱一个人很爱，恨一个人很恨。';
		$keywords='直率';
		$collocation='1个螺、6个螺、9个、10个螺 ';
	
	}
	elseif ($count == 1)
	{
		if($left == 1)
		{
			$assess='坚定，心理素质好，是做大事的材料。但有时一意孤行，容易遭受挫折，不过，失败之后总能东山再起。在爱情上热烈似火。运并不佳，必须靠个人的奋螺取得成就。';
			$keywords='坚定热情';
			$image = "test_11.jpg";
		}
		else
		{
			$assess='性格独立，有领导能力，个别时不择手段，最终注定是成功者。大众情人型。 运并不佳，必须靠个人的奋螺取得成就。';
			$keywords='独立';
			$image = "test_12.jpg";
		}
		$collocation='2个螺、7个螺、10个螺。 ';
	}
	elseif ($count == 2)
	{
		if($left == 2 || $right == 2)
		{
			$assess = "性情温和，人际关系良好。有时缺乏远见。在坎坷之时有贵人相助。螺颇有异性缘，却总是难见中意者。适合在演艺圈发展。";
			$keywords = "温和";
			$image = "test_21.jpg";
		}
		else
		{
			$assess = "性格开朗，好奇心超强。做事往往欲速不达。螺颇有异性缘，却总是难见中意者。适合在演艺圈发展。";
			$keywords = "开朗";
			$image = "test_22.jpg";
		}
		$collocation='1个螺、8个螺、9个螺。';
	}
	elseif($count == 3)
	{
		if($left == 3 || $right == 3)
		{
			$assess = "头脑聪明，做事努力，多为中层领导。但又是家庭型，一生一世对恋人和配偶好。";
			$keywords = "努力";
			$image = "test_31.jpg";
		}
		else
		{
			$assess = "属于全能潜质，只要有机会和足够的时间，能胜任各种工作。感性和理性相配适度，少见的指纹，运气极好的。完美配偶型。";
			$keywords = "潜力股";
			$image = "test_32.jpg";
		}
		$collocation='4个螺、6个螺、7个螺、9个螺。';
	}
	elseif ($count == 4)
	{
		if($left == 4 || $right == 4)
		{
			$assess = "表面明朗，内心孤独。以个人为中心，完美主义者。爱情多波折。";
			$keywords = "孤独";
			$image = "test_41.jpg";
		}
		else
		{
			$assess = "低调。通情达理，有才有貌，深得周围人喜欢。爱情一帆风顺。 适合在有关文字的领域发展。";
			$keywords = "低调";
			$image = "test_42.jpg";
		}
		$collocation='3个螺、5个螺、8个螺。';
	}
	elseif ($count == 5)
	{
		if($left == 5 || $right == 5)
		{
			$assess = "个性强，对现状永不满足，因此很多事不如意。与1个螺、2个螺、3个螺、4个螺的人合作，才能万事顺利。在爱情上要求不高，一点点温柔即可满足。";
			$keywords = "个性强";
			$image = "test_51.jpg";
		}
		else
		{
			$assess = "善良，更多为别人着想。温顺，耐力好。运气中上。在爱情方面，喜欢沉湎于异性偶像。 ";
			$keywords = "善良温顺";
			$image = "test_42.jpg";
		}
		$collocation='1个螺、2个螺、3个螺、4个螺、7个螺。';
	}
	elseif ($count == 6)
	{
		if($left>$right)
		{
			$assess = "有野心，喜欢想入非非。少时不顺，青年之后好运一路飙升，令周围人羡慕。故乡之外为理想发展地。对异性的要求是矛盾的，最低又最高。";
			$keywords = "有野心";
			$image = "test_61.jpg";
		}
		elseif($left<$right)
		{
			$assess = "经常感情用事。自信和自卑同样强烈，成功需外力协助。爱情平稳，缺乏波澜壮阔的高潮。一生幸福。 ";
			$keywords = "感情用事";
			$image = "test_62.jpg";
		}
		elseif($left==$right)
		{
			$assess = "还算开朗。爱幻想。内心多虑，缺乏安全感。实际上，此类指纹运气佳，多是杞人忧天。在爱情上失意多于得意。 ";
			$keywords = "没安全感";
			$image = "test_63.jpg";
		}
		$collocation='3个螺、6螺、9个螺、10个螺。';
	}
	elseif ($count == 7)
	{
		if($left>$right)
		{
			$assess = "内向型，脾气不太好。为了自己的目标能够持之以恒。未来功成名就，不过不适合做王，只适合做相。切记要在恋人和家庭方面多投入一些。此类指纹的女性在爱情上渴望王者（英雄），配偶往往平凡，不过一生平安幸福。";
			$keywords = "内向型";
			$image = "test_71.jpg";
		}
		else
		{
			$assess = "敏感型，对很多事了如指掌，只是不愿意表达。个别时狂热。骨子里对人友善，却总是被人误解。遇到不合适的异性二人矛盾不断，遇到合适的异性一拍即合。 ";
			$keywords = "敏感型";
			$image = "test_72.jpg";
		}
	
		$collocation='1个螺、3个螺、8个螺。';
	}
	elseif ($count == 8)
	{
		if($left>$right)
		{
			$assess = "看似平和，实则挑剔。时而快乐时而忧郁。好运气总是在期盼中不来，无意中却得到多多。感情丰富，身体健康。在爱情上是不现实的人。";
			$keywords = "挑剔";
			$image = "test_81.jpg";
		}
		elseif($left<$right)
		{
			$assess = "自尊心强，有志气。性格双重。和周围人比起来，运气总是不佳，不过只要努力，最后你的成绩注定超过那些运气更好的家伙。对爱情最执着。 ";
			$keywords = "自尊心强";
			$image = "test_82.jpg";
		}
		elseif($left==$right)
		{
			$assess = "善良。中年之前运气不佳，需1个螺相助才能变背运为幸运。在爱情方面幻想多于行动。 ";
			$keywords = "善良爱幻想";
			$image = "test_83.jpg";
		}
		$collocation='2个螺、4个螺、7个螺、10个螺。';
	}
	elseif ($count == 9)
	{
		if($left>$right)
		{
			$assess = "热情，积极，理解力超强，善于变通，有活动能力，富于同情心。不喜欢追人，喜欢被人追。";
			$keywords = "热情";
			$image = "test_91.jpg";
		}
		else
		{
			$assess = "理想远大，与现实距离最远。最适合做情人。";
			$keywords = "理想远大";
			$image = "test_92.jpg";
		}
	
		$collocation='2个螺、3个螺、10个簸箕。';
	}
	elseif ($count == 10)
	{
		$assess = " 善良、固执，外表坚强，内心柔弱。多在艺术上有成就。运气中上，不过呈上升趋势，一直到老。厚情薄命（感情胜过生命），情痴型。";
		$keywords = "情痴型";
		$image = "test_101.jpg";
		$collocation='0个螺、1个螺、6个螺、8个螺。';
	}
	return $result = array(
			'assess'=>$assess,
			'keywords'=>$keywords,
			'image'=>$image,
			'collocation'=>$collocation,
			);
}