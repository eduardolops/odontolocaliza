<?php 

namespace Doctor\Helpers;

use Doctor\Models\ViewCountAccess;
use Cookie;

class CountAccess {


	public function count( $user_id, $type_access )
	{
		
	}

	public function create( $user_id, $type_access )
	{
		if( empty($user_id) or empty($type_access) ) return false; 

		$data = $this->data($user_id, $type_access);

		if( empty(request()->cookie('access')) ){
			$this->setCookie($data);
		}else{
			$decode = explode('__', base64_decode(request()->cookie('access')));
			$count = ViewCountAccess::where(['user_id' => $user_id, 'ip' => $decode[1]])
									->where('created_at', '>=', $decode[2])
									->where('created_at', '<=', $decode[2])
									->count();

			if( $count > 0 ):
				return false;
			else: 
				$this->setCookie($data);
			endif;
		}
	}

	private function data($user_id, $type_access)
	{
		return [
            'user_id'    => $user_id,
            'view'       => 1,
            'type_view'  => $type_access,
            'agent_name' => request()->header('User-Agent'),
            'ip'         => request()->ip(),
		];
	}

	private function setCookie($data)
	{
		$count = ViewCountAccess::create( $data );
		$crypt = base64_encode( $data['user_id'].'__'.request()->ip().'__'.$count->created_at );
		Cookie::queue(Cookie::make('access', $crypt, 5));
		return $count;
	}

}