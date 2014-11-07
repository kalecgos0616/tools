tools
=====

some useful tools for myself

###wildcard_bypass_domain
######remove EOF
$ perl -pe 'chomp if eof' ByPass_domain.txt  > ByPass_domain_without_eof.txt
######generate FoxyProxy config
$ ./cook_to_foxyproxy_json.pl > foxyProxy_bypass.json
