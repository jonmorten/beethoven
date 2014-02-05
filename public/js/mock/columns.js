define( [ 'underscore' ], function( _ ) {
	var build = function ( id, name ) {
		return {
			id: id,
			name: name
		};
	};

	var people = {
		ola: build( 0, 'Ola' ),
		thomas: build( 1, 'Thomas' ),
		kari: build( 2, 'Kari' ),
		tobias: build( 3, 'Tobias' ),
		svein: build( 4, 'Svein' ),
		jm: build( 5, 'Jon-Morten' )
	};
	var projects = {
		aim: build( 0, 'AIM Norway' ),
		krogsveen: build( 1, 'Krogsveen' ),
		lof: build( 2, 'LOfavør' )
	};
	var labels = {
		backlog: build( 0, 'Backlog' ),
		todo: build( 1, 'Todo' ),
		wip: build( 2, 'WIP' ),
		devtest: build( 3, 'Dev test' ),
		feedback: build( 4, 'Feedback' ),
		customer: build( 5, 'Customer' ),
		potest: build( 6, 'P.O. test' ),
		deploy: build( 7, 'Deploy' ),
		live: build( 8, 'Live' ),
		done: build( 9, 'Done' )
	};

	var task = function ( owner, assignees, title, label, project ) {
		return {
			owner: owner,
			assignees: assignees,
			title: title,
			label: label,
			project: project,
			description: 'Lorem ipsum dolor sit amet.'
		};
	};
	var tasks = {
		backlog: [
			task( null, null, 'Dovetail', labels.backlog, projects.aim )
		],
		todo: [
			task( null, null, 'Boondoggle', labels.todo, projects.lof ),
		],
		wip: [
			task( people.jm, [ people.jm ], 'Omnishambles', labels.wip, projects.krogsveen ),
			task( people.ola, [ people.ola ], 'Somnambulist', labels.wip, projects.aim ),
			task( people.svein, [ people.svein ], 'Vamoose', labels.wip, projects.lof ),
			task( people.thomas, [ people.thomas ], 'Nomenclature', labels.wip, projects.lof ),
			task( people.tobias, [ people.tobias ], 'Cheval glass', labels.wip, projects.krogsveen ),
		],
		devtest: [
			task( people.jm, [ people.jm ], 'Skulduggery', labels.devtest, projects.aim ),
			task( people.ola, [ people.ola ], 'Daisy chain', labels.devtest, projects.krogsveen ),
			task( people.thomas, [ people.thomas ], 'Stopgap', labels.devtest, projects.krogsveen ),
		],
		feedback: null,
		customer: [
			task( people.tobias, [ people.tobias ], 'Whippersnapper', labels.customer, projects.lof ),
			task( people.kari, [ people.kari ], 'Voice box', labels.customer, projects.aim ),
		],
		potest: [
			task( people.kari, [ people.kari ], 'Aplomb', labels.potest, projects.lof ),
		],
		deploy: [
			task( people.svein, [ people.svein ], 'Linchpin', labels.deploy, projects.aim ),
		],
		live: null,
		done: null
	};

	var counter = -1;
	var column = function ( name, labels, tasks ) {
		counter++;
		return {
			name: name,
			labels: labels,
			tasks: tasks,
			id: counter,
			priority: counter,
		};
	};

	return [
		column(
			'Backlog',
			[ labels.backlog ],
			tasks.backlog
		),
		column(
			'Todo',
			[ labels.todo ],
			tasks.todo
		),
		column(
			'WIP',
			[ labels.wip ],
			tasks.wip
		),
		column(
			'Dev Test',
			[ labels.devtest ],
			tasks.devtest
		),
		column(
			'Waiting',
			[ labels.feedback, labels.customer ],
			_.without( _.union( tasks.feedback, tasks.customer ), null )
		),
		column(
			'P.O.',
			[ labels.potest ],
			tasks.potest
		),
		column(
			'Deploy',
			[ labels.deploy ],
			tasks.deploy
		),
		column(
			'Live',
			[ labels.live ],
			tasks.live
		),
		column(
			'Done',
			[ labels.done ],
			tasks.done
		),
	];
} );
